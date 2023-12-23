<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'user_id',
        'category_id',
        'image',
        'title',
        'slogan',
        'text',
        'full_text',
        'status'
    ];
    protected $casts = [
        'title' => 'array',
        'slogan' => 'array',
        'text' => 'array',
        'full_text' => 'array'
    ];

    public function category():HasOne
    {
        return $this->hasOne(Category::class,'id','category_id')->where('status',1);
    }
}
