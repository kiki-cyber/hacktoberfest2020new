<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nama', 'username', 'email', 'password'];
    protected $table = 'mahasiswa';
}
