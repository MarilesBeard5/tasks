<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Builder[]|Collection
     */
    public function index()
    {
        return Task::query()->orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Task
     */
    public function store(Request $request)
    {
        $task = new Task();

        $task->name = $request->get('name');
        $task->completed = $request->get('completed') ?? false;
        $task->completed_at = $request->get('completed') ? Carbon::now() : null;

        $task->save();

        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Builder|Builder[]|Collection|Model|Response
     */
    public function update(Request $request, $id)
    {
        try {
            $task = Task::query()->findOrFail($id);

            $task->name = $request->get('name') ?? $task->name;
            $task->completed = $request->get('completed') ?? false;
            $task->completed_at = $request->get('completed') ? Carbon::now() : null;

            $task->save();

            return $task;
        } catch (ModelNotFoundException $e) {
            return response([
                'error' => 'Task not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $task = Task::query()->findOrFail($id);

            $task->delete();
            return response([
                'success' => 'Task Deleted Successfully'
            ]);
        } catch (ModelNotFoundException $e) {
            return response([
                'error' => 'Task not found'
            ]);
        }
    }
}
