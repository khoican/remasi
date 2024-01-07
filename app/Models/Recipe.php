<?php

namespace App\Models;

use App\Models\Images;
use App\Models\Comments;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'ingredients', 'instructions'];

    public function category() {
        return $this->belongsTo(Categories::class, 'categoryId');
    }

    public function images() {
        return $this->hasMany(Images::class, 'recipeId');
    }

    public function comments() {
        return $this->hasMany(Comments::class, 'recipeId');
    }
}
