<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDo;
use App\Http\Requests;
use App\Http\Requests\TodoCreateRequest;
use App\Http\Requests\TodoUpdateRequest;

class ApiController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        return ToDo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (TodoCreateRequest $request)
    {
        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->priority = $request->priority;
        $todo->done = false;
        $todo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        return ToDo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (TodoUpdateRequest $request, $id)
    {
        ToDo::where('id', $id)
            ->update([
                'todo' => $request->todo,
                'priority' => $request->priority,
                'done' => $request->done
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (Request $request, $id)
    {
        Todo::find($id)
            ->delete();
    }
}
