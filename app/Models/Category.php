<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        "title",
        "slug",
        "active",
    ];
    public function Article(){
        $this->hasMany(Article::class);
    }
}
