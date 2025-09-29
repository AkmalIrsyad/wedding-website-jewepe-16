<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;
    protected $table = 'tb_catalogues';
    public $incrementing = true;
    protected $primaryKey = 'catalogue_id'; // jika pakai auto increment id selain default "id"

    protected $fillable = [
        'image',
        'package_name',
        'description',
        'price',
        'status_publish',
        'user_id',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function order()
    {
    return $this->hasMany(Order::class, 'catalogue_id', 'catalogue_id');
    }
}

