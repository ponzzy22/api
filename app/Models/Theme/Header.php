<?php

namespace App\Models\Theme;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $table = 'website_header';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
