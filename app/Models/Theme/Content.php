<?php

namespace App\Models\Theme;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['created_at'];

    protected $table = 'website_content';

    public function user()
    {
        return $this->belongsTo(Content::class, 'user_id');
    }
}
