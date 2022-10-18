<?php

namespace App\Models\Post;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'website_artikel';

    public function user()
    {
        return $this->belongsTo(Artikel::class, 'user_id');
    }
}
