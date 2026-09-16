<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    // Hapus kurung kurawa ekstra '{' yang ada di sini sebelumnya

    protected $fillable = [
        'user_id',
        'book_id',
        'quantity',
    ];

    /**
     * Relasi ke model Book
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    /**
     * Relasi ke model User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
