<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slogan','status'
    ];
    protected $casts = [
        'name' => 'array',
        'slogan' => 'array',
    ];


    public function news()
    {
        return $this->hasMany(News::class, 'category_id', 'id')
            ->where('status', 1);
    }
}
