<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecoundComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'userId',
        'commentId'
    ];

    protected $guarded = [
        'id',
        'userId',
        'commentId'
    ];

    public function Users(){
        return $this->hasMany(User::class, 'userId');
    }

    public function Comment(){
        return $this->hasMany(Comment::class, 'commentId');
    }
}
