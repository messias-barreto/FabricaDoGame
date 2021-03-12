<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'post',
        'subject',
        'image',
        'userId'
    ];

    protected $guarded = [
        'id'
    ];
    
    public function Users(){
        return $this->hasMany(User::class, 'userId');
    }
}
