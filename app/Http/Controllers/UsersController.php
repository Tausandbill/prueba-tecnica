<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    public function index(){
        //GET request al API para obtener todos los datos
        $users = Http::get('https://jsonplaceholder.typicode.com/todos')->json();
        $collection = collect($users);
        $uniqueUserId = $collection->unique('userId');

        //Crando un array para contenter la cantidad de ToDo´s compledatos por cada usuario
        $completedArray = [];
        for($i = 1; $i <= count($uniqueUserId); $i++){
            $completedArray[$i] = 0;
        }

        //Llenando array
        foreach($collection as $item){
            if ($item['completed'] == true) {
                $completedArray[$item['userId']] += 1;
            }
        }
        
        return view('users.index', compact('uniqueUserId', 'completedArray'));
    }
}
