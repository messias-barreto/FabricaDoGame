<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'userId',
        'articleId'
    ];

    protected $guarded = [
        'id',
        'userId',
        'articleId'
    ];

    public function Users(){
        return $this->hasMany(User::class, 'userId');
    }

    public function Article(){
        return $this->hasMany(User::class, 'articleId');
    }
}
