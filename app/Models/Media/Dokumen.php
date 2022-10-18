<?php

namespace App\Models\Media;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['created_at'];

    protected $table = 'website_dokumen';

    public function user()
    {
        return $this->belongsTo(Dokumen::class, 'user_id');
    }
}
