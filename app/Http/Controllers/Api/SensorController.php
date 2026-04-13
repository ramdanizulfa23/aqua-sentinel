<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WaterLog;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk dari ESP32
        $request->validate([
            'ph' => 'required|numeric',
            'temp' => 'required|numeric',
            'turbidity' => 'required|numeric',
        ]);

        // 2. Logic buat nentuin Status (PKM banget nih, ada "otak"-nya)
        $ph = $request->ph;
        $status = 'Aman';

        if ($ph < 6.5 || $ph > 8.5) {
            $status = 'Bahaya';
        } elseif ($ph < 7 || $ph > 8) {
            $status = 'Waspada';
        }

        // 3. Simpan ke Database
        $log = WaterLog::create([
            'ph' => $ph,
            'temp' => $request->temp,
            'turbidity' => $request->turbidity,
            'status' => $status,
        ]);

        // 4. Kasih respon balik ke ESP32 biar dia tau data sukses terkirim
        return response()->json([
            'message' => 'Data berhasil disimpan!',
            'data' => $log
        ], 201);
    }
}
