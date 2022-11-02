<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoClientRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        $Todos = Todo::all();
        return view('index',['Todos' => $Todos]);
    }

    public function create(TodoClientRequest $request){
        $data = $request -> only('task');
        Todo::create($data);
        return redirect('/todo');
    }

    public function update(Request $request){
        $this->validate($request,[
            'task' => ['required','max:20']
        ],[
            'task.required' => '※この項目は入力必須です',
            'task.max' => '※この項目は２０文字以上です'
        ]);
        $data = $request -> only('task');
        Todo::where('id',$request -> id)->update($data);
        return redirect('/todo');
    }

    public function delete(Request $request){
        $data = $request -> only('task');
        Todo::find($request -> id)->delete();
        return redirect('/todo');
    }
}