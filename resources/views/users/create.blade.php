@extends('app')
@section('content')
<div class="card" style="width: 18rem;">
    <div class="card-header">
        Lista de Usuarios
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($uniqueUserId as $user)
        <a href="#">
            <li class="list-group-item">Usuario {{$user['userId']}}</li>
        </a>
        @endforeach
    </ul>
</div>

@endsection