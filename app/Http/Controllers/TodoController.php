<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return $this->getAll();
    }

    private function getAll(){
        return Todo::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
    }
    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->description = $request->description;
        $todo->terminated = $request->terminated;
        $todo->user_id = auth()->id();
        $todo->save();

        return $todo;
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->description = $request->description;
        $todo->terminated = $request->terminated;
        $todo->save();

        return $todo;
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
    }
    public function all(){
        Todo::where('user_id', auth()->id())->delete();
    }
    public function terminateAll(){
         Todo::where([
            ['terminated', '=', false],
            ['user_id', auth()->id()],
        ])->update(['terminated' => true]);
         return $this->getAll();
    } 
}
