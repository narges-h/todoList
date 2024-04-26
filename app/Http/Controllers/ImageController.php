<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Tag;
use App\Models\Image;

class ImageController extends Controller
{
    public function imagesPage($id){

        $todo = Todo::findOrFail($id);

        return view('images' ,[
            'todo' => $todo
        ]);

    }
    // Store Image
    public function storeImage(Request $request,$id)
    {
        $validate_data = Validator::make($request->all() , [
            'image' => 'required|image',
        ])->validated();

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

    
        Todo::find($id)->images()->create([
            'image' => asset('images/' . $imageName),
        ]);

        return back()->with('success', 'Image uploaded Successfully!');
    }
}

