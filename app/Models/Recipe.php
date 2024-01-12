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

    protected $fillable = ['name', 'categoryId', 'description', 'ingredients', 'instructions', 'nutritions', 'image'];

    public function category() {
        return $this->belongsTo(Categories::class, 'categoryId');
    }

    public function comments() {
        return $this->hasMany(Comments::class, 'recipeId');
    }
}
