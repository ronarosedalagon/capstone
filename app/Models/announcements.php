<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcements extends Model
{
    use HasFactory;

    protected $fillable =[
        'file',
        'title',
        'date',
        'venue',
        'details',
        'content',
        'link',
        'audience'
    ];
}
