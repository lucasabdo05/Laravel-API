<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() // Lista todas as tarefas.
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request) // Cria uma nova tarefa.
    {
        $task = Task::create($request->all());
        return response()->json($task, 201); // O código de status HTTP 201 significa "Created".
    }

    public function show(Task $task) // Retorna os detalhes de uma tarefa específica.
    {
        return response()->json($task);
    }

    public function update(Request $request, Task $task) // Atualiza os dados de uma tarefa existente.
    {
        $task->update($request->all());
        return response()->json($task);
    }

    public function destroy(Task $task) // Exclui uma tarefa.
    {
        $task->delete();
        return response()->json(null, 204); // O código de status HTTP 204 significa "No Content".
    }
}

