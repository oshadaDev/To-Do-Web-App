<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class TodoController extends Controller
{
    protected $task;
    public function __construct()
    {
        $this->task = new ToDo();
    }

    public function index()
    {
        $response['tasks'] = $this->task->all();
        return view('pages\todo\index')->with($response);
    }

    public function store(Request $request)
    {
        //to save every variable data  
        $this->task->create($request->all());

        //back to task adding screen
        return redirect()->back();
    }

    public function delete($task_id)
    {
        $this->task->destroy($task_id);
        return redirect()->back();
    }

    public function done($task_id)
    {
        $task = $this->task->find($task_id);
        $task->done = 1;
        $task->update();
        return redirect()->back();
    }

    

    public function edit(Request $request)
    {
        $response['task'] = ToDo::find($request->task_id);

        return view('pages.todo.edit', $response);
    }

    public function update(Request $request, $task_id)
{
    $task = ToDo::findOrFail($task_id);

    $task->update($request->all());

    return redirect()->route('todo');
}
}
