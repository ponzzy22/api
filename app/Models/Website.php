<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $table = 'website_list';

    protected $guarded = ['id'];

    public function token()
    {
        return $this->belongsTo(Token::class);
    }
}
