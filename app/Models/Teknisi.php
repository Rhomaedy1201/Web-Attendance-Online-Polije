<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Teknisi extends Model
{
    /** @use HasFactory<\Database\Factories\TeknisiFactory> */
    use HasFactory, Notifiable;

    protected $table = 'teknisi'; // Nama tabel di database

    protected $fillable = [
        'nip', 'nama', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    // Gunakan NIP sebagai username
    public function getAuthIdentifierName()
    {
        return 'nip';
    }
}
