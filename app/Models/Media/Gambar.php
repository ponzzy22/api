<?php

namespace App\Models\Media;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['created_at'];

    protected $table = 'website_gambar';

    public function user()
    {
        return $this->belongsTo(Gambar::class, 'user_id');
    }
}
