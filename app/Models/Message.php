<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Message extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'name',
        'email',
        'content',
    ];
}
