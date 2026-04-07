<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'invoice_number',
        'customer_name',
        'customer_number',
        'fiscal_data',
        'order_date',
        'delivery_address',
        'notes',
        'status',
        'deleted',
    ];

    protected $casts = [
        'deleted'    => 'boolean',
        'order_date' => 'datetime',
    ];

    // One Order belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One Order has many PhotoEvidences
    public function photoEvidences()
    {
        return $this->hasMany(PhotoEvidence::class);
    }
}