<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Images extends Model
{
    use HasFactory;

    protected $fillable = ['image'];

    public function recipe() {
        return $this->belongsTo(Recipe::class, 'recipeId');
    }
}
