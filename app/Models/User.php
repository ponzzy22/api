<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Anggota\Honorer;
use App\Models\Post\Artikel;
use App\Models\Post\Berita;
use App\Models\Post\Informasi;
use App\Models\Post\Publikasi;
use App\Models\Theme\footer;
use App\Models\Theme\Header;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'sintari_user';
    protected $guarded = ['id'];

    // Post
    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'user_id');
    }


    public function berita()
    {
        return $this->hasMany(Berita::class, 'user_id');
    }

    public function informasi()
    {
        return $this->hasMany(Informasi::class, 'user_id');
    }

    public function publikasi()
    {
        return $this->hasMany(Publikasi::class, 'user_id');
    }

    public function honorer()
    {
        return $this->hasMany(Honorer::class, 'user_id');
    }


    public function header()
    {
        return $this->hasMany(Header::class, 'user_id');
    }

    public function footer()
    {
        return $this->hasMany(footer::class, 'user_id');
    }
}
