<?php

namespace App\Models\Master2;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    protected $table = 'website_user_key';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
