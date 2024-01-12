<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReplyComments extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'userId', 'commentId'];

    public function comment() {
        return $this->belongsTo(Comments::class, 'commentId');
    }

    public function user() {
        return $this->belongsTo(User::class, 'userId');
    }
}
