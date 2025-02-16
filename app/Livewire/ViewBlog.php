<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Kategori;
use App\Models\Like;
use App\Models\ReplyComment;
use App\Models\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewBlog extends Component
{
    public $id_blog, $status, $comment, $reply_comment, $id_replyComment;
    public $comment_view = [];
    public $id_profile = [];

    #[Layout('empty-layout')]
    public function mount()
    {
        $this->id_blog = session()->get('id_blog');

        // Perbaikan: Cek jika user sudah like atau belum
        $like = Like::where('id_user', auth()->id())
            ->where('id_blog', $this->id_blog)
            ->exists();

        $this->status = !$like;
    }

    public function render()
    {
        $data = Blog::select([
            'blog.id_blog',
            'blog.id_user',
            'blog.tanggal',
            'blog.title',
            'blog.content',
            'blog.image_url',
            'kategori.kategori',
            'users.nama as nama_user',
        ])
            ->join('kategori', 'blog.id_kategori', '=', 'kategori.id_kategori')
            ->leftJoin('users', 'blog.id_user', '=', 'users.id_users')
            ->where('blog.id_blog', $this->id_blog)
            ->first();

        $this->id_profile = $data->id_user;

        $comment_view = Comment::select([
            'comment.id_comment',
            'comment.comment',
            'comment.tanggal',
            'users.nama as nama_user',
            'users.image_profile'
        ])
            ->join('users', 'comment.id_user', '=', 'users.id_users')
            ->where('comment.id_blog', $this->id_blog)
            ->get();

        $reply_comment_views = ReplyComment::select([
            'replay_comment.id_replay_comment',
            'replay_comment.id_comment',
            'comment.comment as Komen',
            'replay_comment.comment as replay_comment',
            'replay_comment.tanggal',
            'users.id_users as id_replay_users',
            'users.nama as nama_reply_users',
            'users.image_profile as image_replay_users'
        ])
            ->join('comment', 'replay_comment.id_comment', '=', 'comment.id_comment')
            ->join('users', 'replay_comment.id_user', '=', 'users.id_users')
            ->whereIn('comment.id_comment', $comment_view->pluck('id_comment'))
            ->get()
            ->groupBy('id_comment');

        $count_reply_comment = ReplyComment::whereIn('id_comment', $comment_view->pluck('id_comment'))
            ->selectRaw('id_comment, COUNT(*) as total')
            ->groupBy('id_comment')
            ->pluck('total', 'id_comment');

        // dd($reply_comment);

        $viewCount = View::where('id_blog', $this->id_blog)->count();
        $likeCount = Like::where('id_blog', $this->id_blog)->count();
        $commentCount = $comment_view->count();
        $total_ReplyComment = $count_reply_comment->sum();
        $total_Comment = $commentCount + $total_ReplyComment;

        return view('livewire.view-blog', [
            'data' => $data,
            'view' => $viewCount,
            'like' => $likeCount,
            'comment_views' => $comment_view,
            'comment_count' => $commentCount,
            'Reply_comment' => $reply_comment_views,
            'count_reply' => $count_reply_comment,
            'total_comment' => $total_Comment,
        ]);
    }

    public function clearSessions()
    {
        session()->forget('id_blog');
        $this->id_blog = null;
    }

    public function addlike()
    {
        $like = Like::where('id_user', auth()->id())
            ->where('id_blog', $this->id_blog)
            ->first();

        if (!$like) {
            Like::create([
                'id_user' => auth()->id(),
                'id_blog' => $this->id_blog,
            ]);
            $this->status = false;
        } else {
            $like->delete();
            $this->status = true;
        }
    }

    public function addComment()
    {
        Comment::create([
            'id_blog' => $this->id_blog,
            'id_user' => auth()->id(),
            'comment' => $this->comment,
            'tanggal' => now(),
        ]);

        $this->comment = '';
        return redirect('/view-blog');
    }

    public function ReplyCommentId($id)
    {
        $this->id_replyComment = $id;
    }
    public function addReplyComment()
    {
        ReplyComment::create([
            'id_comment' => $this->id_replyComment,
            'id_user' => auth()->user()->id_users,
            'comment' => $this->reply_comment,
            'tanggal' => date(now()),
        ]);
        return redirect('/view-blog');
    }
    public function clear_form()
    {
        $this->comment = '';
        $this->id_replyComment = '';
    }

    public function getIdProfile() {
        session()->put('id_profile', $this->id_profile);
        return redirect('/profile-multi-user');
    }
}
