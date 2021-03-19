@extends('app')
@section('content')
<div class="offset-3 mt-5">
    <a href="/todos/show/{{$todo[$todoId-1]["userId"]}}" class="text-reset">
        <h1><i class="bi bi-arrow-left"></i></h1>
    </a>
</div>
<div class="card mt-4 col-md-6 col-sm-10">
    <div class="card-header d-flex justify-content-md-between">
        <h4>Editar ToDo´s</h4>
    </div>
    <div class="card-body">
        <form id="form" method="POST" action="/todos/{{$todo[$todoId-1]["userId"]}}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$todo[$todoId-1]["title"]}}">
                <small id="title" class="form-text text-muted">Titulo del ToDo</small>
            </div>
            <input type="hidden" name="userId" id="userId" value="{{$todo[$todoId-1]["userId"]}}">
            <input type="hidden" name="id" id="id" value="{{$todo[$todoId-1]["id"]}}">
            <input type="hidden" name="completed" id="completed" value="{{$todo[$todoId-1]["completed"] ? 'true' : 'false'}}">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<script>
    
    function update(){
        var userId = document.getElementById('userId').value;
        var id = document.getElementById('id').value;
        var title = document.getElementById('title').value;
        var completed = document.getElementById('completed').value;
        
        fetch('https://jsonplaceholder.typicode.com/posts/1', {
            method: 'PUT',
            body: JSON.stringify({
                userId: userId,
                id: id,
                title: title,
                completed: completed,
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        })
        .then((response) => response.json())
        .then((json) => console.log(json));        
    }   
    
</script>

@endsection