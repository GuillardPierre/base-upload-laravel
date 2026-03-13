<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadPublic(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);
        $name = $request->file('avatar')->getClientOriginalName();
        $path = request()->file('avatar')->storeAs('avatars', $name, 'public');
        return back()->with('success', 'Avatar uploadé : ' . $path);
    }

    public function uploadPrivate(Request $request)
    {
        $request->validate([
            'pdf' => ['required', 'mimes:pdf', 'max:5120'],
        ]);

        // Store here

        return back()->with('success', 'PDF uploadé : ' . $path);
    }
}