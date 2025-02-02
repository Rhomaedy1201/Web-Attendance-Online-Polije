<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'mahasiswa';

    protected $fillable = [
        'id', 
        'nim', 
        'nama',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    // Gunakan NIP sebagai username
    public function getAuthIdentifierName()
    {
        return 'nim';
    }
}
