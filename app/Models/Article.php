<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "slug",
        "image ",
        "description",
        "active",
    ];
    public function tags(){
        $this->hasMany(Tag::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);    }
}
