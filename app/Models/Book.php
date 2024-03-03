<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{   
    protected $fillable = [
    'name',
    'description',
    'author_id',
    'user_id',
    'article_id',
    'publicationYear',
    'cover',
    'added'
];
    public $timestamps = false;
    use HasFactory;
}
