<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function create()
    {
        return view('task.create', ['task' => new Task()]);
    }

    public function store(TaskFormRequest $request)
    {
        Task::create($request->validated());

        return to_route('home')->with('success', "Vous venez de créer un nouvel article avec succès");
    }

    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        return view('task.edit', ['task' => $task]);
    }

    public function update(TaskFormRequest $request, Task $task)
    {
        $task->update($request->validated());

        return to_route('home')->with('success', "Modification éffectuée avec succès");
    }

    public function destroy(Task $task)
    {
        $title = $task->title;
        $task->delete();

        return to_route('home')->with('success', "Vous venez de supprimer l'article $title avec success");
    }
}
