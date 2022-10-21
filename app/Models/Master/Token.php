<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $table = 'website_token';

    protected $guarded = ['id'];

    public function website()
    {
        return $this->hasOne(Website::class);
    }
}
