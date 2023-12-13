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
                                    <h3 class="text-center font-weight-light my-4">Registrar un proveedor</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('add.supplier.save') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input required type="text" name="name" class="form-control"
                                                        placeholder="">
                                                    <label for="inputFirstName">Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input required type="text" name="phone" class="form-control"
                                                        placeholder="">
                                                    <label for="inputFirstName">Telefono</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input required type="mail" name="mail" class="form-control"
                                                placeholder="" />
                                            <label for="inputEmail">Corre electronico</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input required type="text" name="address" class="form-control"
                                                    placeholder="">
                                                <label for="inputFirstName">Dirección</label>
                                            </div>
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
