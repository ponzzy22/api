<?php

namespace App\Models\Media;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['created_at'];

    protected $table = 'website_video';

    public function user()
    {
        return $this->belongsTo(Video::class, 'user_id');
    }
}
