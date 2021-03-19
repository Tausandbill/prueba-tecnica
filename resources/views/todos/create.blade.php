@extends('app')
@section('content')
<div class="offset-3 mt-5">
    <a href="/todos/show/{{$userId}}" class="text-reset">
        <h1><i class="bi bi-arrow-left"></i></h1>
    </a>
</div>
<div class="card mt-4 col-md-6 col-sm-10 ">
    <div class="card-header d-flex justify-content-md-between">
        <h4>Crear ToDo</h4>
    </div>
    <div class="card-body">
        <form id="form" method="POST" action="/todos">
            @csrf
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" name="title" class="form-control" id="title" required>
                <small id="title" class="form-text text-muted">Titulo del ToDo</small>
            </div>
            <input type="hidden" name="userId" id="userId" value="{{$userId}}">
            <button type="submit" onclick="update()" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<script>
    function update(){
        var userId = document.getElementById('userId').value;
        var title = document.getElementById('title').value;
        
        fetch('https://jsonplaceholder.typicode.com/posts', {
            method: 'POST',
            body: JSON.stringify({
                userId: userId,
                title: title,
                completed: false,
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