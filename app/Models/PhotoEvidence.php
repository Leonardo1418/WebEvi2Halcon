<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoEvidence extends Model
{
    protected $table = 'photo_evidences';
    
    protected $fillable = [
        'order_id',
        'photo_type',
        'file_path',
        'upload_date',
    ];

    protected $casts = [
        'upload_date' => 'datetime',
    ];

    // One PhotoEvidence belongs to an Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}