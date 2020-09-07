<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CommentFormRequest $request)
    {
        Comment::create($request->all());

        return redirect()->route('tasks.show', $request->task_id);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentFormRequest $request, $id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->update($request->all());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tasks.index')->with('fail_status', trans('msg.find_fail'));
        }

        return redirect()->route('tasks.show', $request->task_id)->with('status', trans('msg.update_successful'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tasks.index')->with('fail_status', trans('msg.find_fail'));
        }

        return redirect()->route('tasks.show', $request->task_id)->with('msg', trans('msg.delete_successful'));
    }
}
