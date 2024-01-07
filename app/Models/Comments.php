<?php

namespace App\Models;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['comment'];

    public function recipe() {
        return $this->belongsTo(Recipe::class, 'recipeId');
    }

    public function reply() {
        return $this->hasMany(Comments::class, 'commentId');
    }

    public function user() {
        return $this->belongsTo(User::class, 'userId');
    }
}
