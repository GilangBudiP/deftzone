<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function upload(Request $request)
    {
        $image = $request->file('image');
    
        // Simpan gambar ke storage atau penyimpanan yang diinginkan
        $path = $image->store('public/images');
    
        // Mengembalikan URL gambar yang dapat diakses publik
        $url = Storage::url($path);
    
        return response()->json([
            'success' => true,
            'url' => $url
        ]);
    }
}
