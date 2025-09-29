<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $table = 'tb_order';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'catalogue_id',
        'name',
        'email',
        'phone_number',
        'wedding_date',
        'status',
        'user_id'
    ];
      // Relasi ke Catalogue
    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class, 'catalogue_id', 'catalogue_id');
    }
}
