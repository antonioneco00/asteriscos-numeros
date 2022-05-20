<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function figure() {
        return $this->belongsTo('App\Models\Figure', 'figure_id');
    }
}
