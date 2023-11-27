<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('avatar');
        $path = $file->store('avatars', 'public'); // Lưu trong thư mục 'avatars' của disk 'public'

        // Tạo URL cho file
        $url = Storage::url($path);

        return response()->json(['url' => $url]);
    }
}

