<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
