<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all(); // retirve all data from the daabase for todos 
        return view('todo.index', ['todos' => $todos]);

    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    public function create()
    {
        return view('todo.create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        Todo::create([
            'title' => $request->title
        ]);
        return redirect('/todos')->with('success', 'Todo created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)   //ليش هنا باي ديفولت سوا برايمتر من نوع تو دو على طول 
    {
        $todo = Todo::findOrFail($id);
        return view('todo.show', ['todo' => $todo]);
    }
    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // GET /todos/{id}/edit - Show edit form
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.edit', ['todo' => $todo]);
    }
    // /**
    //  * Update the specified resource in storage.
    //  */
    // PUT /todos/{id} - Update todo
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $todo = Todo::findOrFail($id);
        $todo->update([
            'title' => $request->title,
            'is_completed' => $request->has('is_completed')
        ]);
        return redirect('/todos')->with('success', 'Todo updated!');
    }
    // /**
    //  * Remove the specified resource from storage.
    //  */
    // DELETE /todos/{id} - Delete todo
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect('/todos')->with('success', 'Todo deleted!');
    }
}
