@extends('app')
@section('content')
<div class=" col-md-6 col-sm-10 card mt-5">
    <div class="card-header">
        <h3>Lista de Usuarios</h3>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach ($uniqueUserId as $user)
            <a class="text-reset text-decoration-none" href="/todos/show/{{$user['userId']}}">
                <li class="list-group-item d-flex justify-content-between">
                    <h5>Usuario {{$user['userId']}}</h5>
                    <h6>Completados: {{$completedArray[$user['userId']]}} de 20</h6>
                </li>
            </a>
            @endforeach
        </ul>
    </div>
    
</div>

@endsection