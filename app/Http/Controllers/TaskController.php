<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    public function index() // Lista todas as tarefas.
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request) // Cria uma nova tarefa.
    {
        try
        {
            $validatedData = $request->validate([
                'titulo' => 'required|string',
                'descricao' => 'required|string',
                'status' => 'required|in:concluida,nao_concluida',
            ]);

            $task = Task::create($validatedData);
            return response()->json($task, 201); // O código de status HTTP 201 significa "Created".
        }

        catch (ValidationException $error)
        {
            return response()->json(['message' => 'Ocorreu um erro durante o processamento da requisição. Verifique se todos os campos estão preenchidos corretamente.', 
            'errors' => $error->errors()], 
            422);
        }
    }

    public function show(Task $task) // Retorna os detalhes de uma tarefa específica.
    {
        return response()->json($task);
    }

    public function update(Request $request, Task $task) // Atualiza os dados de uma tarefa existente.
    {
        try
        {
            $validatedData = $request->validate([
                'titulo' => 'required|string',
                'descricao' => 'required|string',
                'status' => 'required|in:concluida,nao_concluida',
            ]);

            $task->update($validatedData);
            return response()->json($task);
        }

        catch (ValidationException $error)
        {
            return response()->json(['message' => 'Ocorreu um erro durante o processamento da requisição. Verifique se todos os campos estão preenchidos corretamente.', 
            'errors' => $error->errors()], 
            422);
        }
    }

    public function destroy(Task $task) // Exclui uma tarefa.
    {
        $task->delete();
        return response()->json(null, 204); // O código de status HTTP 204 significa "No Content".
    }
}