<?php

namespace App\Models\Post;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_publikasi',
        'gambar_publikasi',
        'asset_publikasi',
    ];

    protected $table = 'website_publikasi';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
