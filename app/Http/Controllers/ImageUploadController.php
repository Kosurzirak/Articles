<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
public function upload(Request $request)
{
    
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100,max_width100,max_height=100',
    ]);
    
    $uploadPath = public_path('uploads');
    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }
    
    if ($request->file('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move($uploadPath, $imageName);
 
        return redirect()->route('image.form')
            ->with('success', 'Image uploaded successfully!')
            ->with('image', $imageName);
    }
    return redirect()->route('image.form')->with('error', 'Image upload failed.');
}   
    public function showForm()
{
    return view('upload');
}
    public function listImages()
{
    $images = glob(public_path('uploads/*.*')); 
    $images = array_map(function ($image) {
        return asset('uploads/' . basename($image)); 
    }, $images);
    return view('images', compact('images'));
}
}