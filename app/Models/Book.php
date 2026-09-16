<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'published_year',
        'price',
        'stock',
        'description',
        'image',
    ];

    protected $casts = [
        'published_year' => 'integer', 
        'price' => 'decimal:2', 
        'stock' => 'integer'
        ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
