<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    use HasFactory;
    protected $table = 'replay_comment';
    protected $primaryKey = 'id_replay_comment';
    protected $hidden = '';
    protected $guarded = [];
    protected $timestamp = false;
}
