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
        "category_id",
        "user_id",
    ];

    public function tags()
    {
        $this->belongsToMany(Tag::class,'article_tag');
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
