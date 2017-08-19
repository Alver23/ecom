@extends('layouts.app')

@section('content')
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" id="formButtonPermission">Nuevo Registro</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table" id="table_permission">
                        <thead>
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Nombre a mostrar
                            </th>
                            <th>
                                Descripcion
                            </th>
                            <th>
                                Accion
                            </th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formPermissionModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light-blue-active">
                    <button type="button" class="close closePermissionModal">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Permisos</h4>
                </div>
                <form action="{{ route('permisos.store') }}" method="post" id="formPermission">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <p>
                                    <strong>Nota</strong> <span>*</span> Indica campo requerido
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="name">* Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control" maxlength="191">
                                </div>
                                <div class="form-group">
                                    <label for="display_name">Nombre a mostrar</label>
                                    <input type="text" name="display_name" id="display_name" class="form-control"  maxlength="191">
                                </div>
                                <div class="form-group">
                                    <label for="description">Descripcion</label>
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-default closePermissionModal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/permission.js') }}?v={{ time() }}"></script>
@endpush