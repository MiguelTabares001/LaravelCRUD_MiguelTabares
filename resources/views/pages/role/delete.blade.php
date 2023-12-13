@extends('layout.App')

@section('content')
    <div class="container-fluid px-4">
        <div class="row mt-5">
            <div class="card border-3 roundedn shadow-lg p-3">
                <div class="card-head d-flex justify-content-between align-items-center">
                    <h2>Confimar eliminación</h2>
                    <a href=" {{ route('list.role') }} " class="btn btn-primary">Volver</a>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <button class="list-group-item list-group-item-action list-group-item-warning"><span
                                style="font-weight: bold">Id: </span>{{ $role['id'] }}</button>
                        <button class="list-group-item list-group-item-action list-group-item-warning"><span
                                style="font-weight: bold">Nombre: </span>{{ $role['name'] }}</button>
                    </div>
                    <form action=" {{ route('delete.role.destroy', $role['id']) }} " method="POST" class="row mt-4">
                        @csrf
                        <button type="submit" class="btn btn-danger mx-auto" style="width: 110px">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
