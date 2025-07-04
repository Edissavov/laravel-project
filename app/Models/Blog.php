<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
       'title',
       'description',
       'user_id',
       'category_id',
       'is_published',
       'thumbnail',
       'slug'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function author() {
        return $this->belongsTo( User::class,'user_id');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this ->belongsToMany(Tag::class);
    }
}
