@extends('layout.App')

@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Editar la categoría: {{$categorie['name']}}</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('edit.categorie.save', $categorie['id']) }}" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input required type="mail" name="mail" class="form-control"  placeholder="" value="{{ $categorie['mail'] }}">
                                            <label for="inputEmail">Nombre</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input required type="mail" name="description" class="form-control"  placeholder="" value="{{ $categorie['description'] }}">
                                            <label for="inputEmail">Descripción</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary btn-block" type="submit">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
