<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PhotoEvidence;
use Illuminate\Http\Request;

class PhotoEvidenceController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'photo'      => 'required|image|max:4096',
            'photo_type' => 'required|in:Route,Delivery',
        ]);

        $path = $request->file('photo')->store('evidences', 'public');

        PhotoEvidence::create([
            'order_id'    => $order->id,
            'photo_type'  => $request->photo_type,
            'file_path'   => $path,
            'upload_date' => now(),
        ]);

        return redirect()->route('orders.show', $order)
                         ->with('success', 'Photo uploaded.');
    }
}