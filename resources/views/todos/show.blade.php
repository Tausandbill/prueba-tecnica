@extends('app')
@section('content')
<div class="offset-3 mt-5">
    <a href="/users/index" class="text-reset">
        <h1><i class="bi bi-arrow-left"></i></h1>
    </a>
</div>
<div class="card mt-4 mb-4 col-md-8 col-sm-10 ">  
    <div class="card-header d-flex justify-content-md-between">
        <h4>Lista de ToDo´s del Usuario {{$userId}}</h4>
        <a class="btn btn-sm btn btn-outline-success mr-5" href="/todos/create/{{$userId}}">Añadir +</a>
    </div>
    <div class="card-body">
        <table style="border-collapse: separate; border-spacing: 20px 0;">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Estado</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                <tr>
                    <td class="py-3">{{$todo['title']}}</td>
                    <td class="py-3">{{ $todo['completed'] ? 'Completado' : 'En processo'}}</td>
                    
                    @if ($todo['completed'] == false)
                        <form method="POST" action="/todos/{{$todo['id']}}">
                            @method('PUT')
                            @csrf
                            <td><button type="submit" class="btn btn-sm btn btn-outline-success mr-5">Completar</button></td>
                            <input type="hidden" name="flag" value="completed">
                            <input type="hidden" name="userId" value="{{$todo['userId']}}">
                        </form>
                    @else
                        <td></td>
                    @endif
                    <td><a class="btn btn-sm btn btn-outline-primary mr-5" href="/todos/{{$todo['id']}}/edit">Editar</a></td>
                    <form method="POST" action="/todos/{{$todo['id']}}">
                        @method('DELETE')
                        @csrf
                        <td><button type="submit" class="btn btn-sm btn btn-outline-danger mr-5">Eliminar</button></td>
                    </form>                    
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection