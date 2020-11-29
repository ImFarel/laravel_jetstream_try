<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookInvitation extends Model
{
    use HasFactory;

    protected $fillable = ['groom', 'bride', 'password'];
    protected $hidden = ['password'];
}
