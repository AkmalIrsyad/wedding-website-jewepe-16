<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
     use HasFactory;

    // Nama tabel (kalau beda dari default plural)
    protected $table = 'tb_settings';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'website_name',
        'phone_number1',
        'phone_number2',
        'email1',
        'email2',
        'address',
        'maps',
        'logo',
        'Facebook_url',
        'Instagram_url',
        'Youtube_url',
        'Header_bussines_hour',
        'Time_bussines_hour',
    ];
}
