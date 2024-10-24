<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'no_hp',
        'semester',
        'ipk',
        'beasiswa',
        'berkas',
        'status',
    ];
}
