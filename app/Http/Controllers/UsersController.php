<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    public function index(){
        $users = Http::get('https://jsonplaceholder.typicode.com/todos')->json();
        $collection = collect($users);
        $uniqueUserId = $collection->unique('userId');
        //dd($uniqueUserId);

        $completedArray = [];
        for($i = 1; $i <= count($uniqueUserId); $i++){
            $completedArray[$i] = 0;
        }

        foreach($collection as $item){
            if ($item['completed'] == true) {
                $completedArray[$item['userId']] += 1;
            }
        }
        //dd($completedArray);
        return view('users.index', compact('uniqueUserId', 'completedArray'));
    }
}
