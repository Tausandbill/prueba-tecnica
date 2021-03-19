<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodosController extends Controller
{
    public function show($userId){
        //GET request a JSONPlaceHolder
        $users = Http::get('https://jsonplaceholder.typicode.com/todos')->json();     
        
        //Creando collecion de los resultados
        $collection = collect($users);

        //Escogiendo ToDo´s que pertenescan al usuario seleccionado Y contando resultados
        $todos = $collection->where('userId', $userId);
        $countTodos = count($todos);

        //Escogiendo ToDo´s completados Y contando resultados
        $completed = $todos->where('completed', true);
        $countCompleted = count($completed);
        return view('todos.show', compact('userId', 'todos', 'countTodos', 'completed', 'countCompleted'));
    }

    public function edit($todoId)
    {
        //GET request a JSONPlaceHolder
        $users = Http::get('https://jsonplaceholder.typicode.com/todos')->json();

        //Creando collecion de los resultados
        $collection = collect($users);

        //Recolectado datos del ToDo selecionado para editar
        $todo = $collection->where('id', $todoId);
        return view('todos.edit', compact('todo', 'todoId'));
    }

    public function create($userId)
    { 
        return view('todos.create', compact('userId'));
    }

    public function store()
    {
        //Recibiendo datos de la forma
        $userId = request()->userId;
        $title = request()->title;

        //Generando POST request al API
        $response = Http::withHeaders([
            'Content-type' => 'application/json; charset=UTF-8',
        ])->post('https://jsonplaceholder.typicode.com/todos', [
            'userId' => $userId,
            'title' => $title,
            'completed' => false
        ]);

        //Descomentar para ver respuesta de la request
        //dd($response);

        return redirect('/todos/show/' . $userId);
    }

    public function update($todoId)
    {
        $userId = request()->userId;

        //Determinado si se esta editando el ToDo o marcandolo como completado
        if (request()->flag == 'completed') {
            
            //Generando PUT request al API para actualizar campo 'completed'
            $response = Http::withHeaders([
                'Content-type' => 'application/json; charset=UTF-8',
            ])->put('https://jsonplaceholder.typicode.com/todos/' . $todoId, [
                'id' => $todoId,
                'completed' => true
            ]);            
        }
        else {
            //Recibiendo datos de la forma
            $title = request()->title;
            $completed = request()->completed;

            //Generando PUT request al API para actualizar campo 'title'
            $response = Http::withHeaders([
                'Content-type' => 'application/json; charset=UTF-8',
            ])->put('https://jsonplaceholder.typicode.com/todos/' . $todoId, [
                'userId' => $userId,
                'id' => $todoId,
                'title' => $title,
                'completed' => $completed
            ]);
        } 

        //Descomentar para ver respuesta de la request
        //dd($response);     

        return redirect('/todos/show/'. $userId);
    }

    public function destroy($todoId)
    {        
        //Generando DELETE request al API
        $response = Http::withHeaders([
            'Content-type' => 'application/json; charset=UTF-8',
        ])->delete('https://jsonplaceholder.typicode.com/todos/' . $todoId, []);

        //Descomentar para ver respuesta de la request
        //dd($response);

        return redirect('/todos/show/' . $todoId);
    }
}
