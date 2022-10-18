<?php

namespace App\Models\Anggota;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honorer extends Model
{
    use HasFactory;

    protected $table = 'website_honorer';
    public function user()
    {
        return $this->belongsTo(Honorer::class, 'user_id');
    }
}