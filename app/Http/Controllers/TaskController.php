<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskFormRequest $request)
    {
        $task = Task::create([
            'name' => $request->name,
        ]);

        return redirect(route('tasks.index'))->with('status', trans('msg.create_successful'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $task = Task::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect(route('tasks.index'))->with('fail_status', trans('msg.find_fail'));
        }

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskFormRequest $request, $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->update([
                'name' => $request->name,
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect(route('tasks.index'))->with('fail_status', trans('msg.find_fail'));
        }

        return redirect(route('tasks.edit', $task->id))->with('status', trans('msg.update_successful'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();
        } catch (ModelNotFoundException $e) {
            return redirect(route('tasks.index'))->with('fail_status', trans('msg.find_fail'));
        }

        return redirect(route('tasks.index'))->with('msg', trans('msg.delete_successful'));
    }
}
