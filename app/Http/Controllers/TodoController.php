<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use App\Models\Image;


class TodoController extends Controller
{
    public function lists(){
        $imagesTodo = Todo::find(3)->images();

        foreach($imagesTodo as $i){
            echo($i->image);
        }

        // $imageTag = Tag::find(1)->image1();

        // foreach($imageTag as $i){
        //     echo($i->image);
        // }
       
        echo(Tag::find(1)->image()->first()->image);

        // $todo = Todo::get();     
        // return view('lists',[
        //     'todo'=>$todo]);

        

        
    }

    public function insertTask(){

        Auth::loginUsingId(1);
        // dd(Auth::check());
        $validate_data = Validator::make(request()->all() , [
            'text' => 'required|string|min:1',
        ])->validated();


       
        Todo::create([
            'text' => $validate_data['text'],
            'user_id' => Auth::user()->id
        ]);
        return redirect('lists');
    }

    public function delete($id){
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return back();
    }
    public function updatePage($id){
        $todo = Todo::findOrFail($id);
        return view('update' ,[
            'todo' => $todo
        ]);
    }

    public function updating($id) {
        $validate_data = Validator::make(request()->all() , [
            'text' => 'required|string|min:1',
        ])->validated();
    
        $todo = Todo::findOrFail($id);
      
        $todo->update([
            'text' => $validate_data['text']
    
        ]);
        return redirect('lists');
    }
}
