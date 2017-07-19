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
                <input type="hidden" name="permission_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p>
                                <strong>Nota</strong> <span class="text-red">*</span> indica el campo requerido.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="permission_name"><span class="label label-danger">*</span>Nombre</label>
                                <input type="text" name="name" id="permission_name" class="form-control" required="true" maxlength="191">
                            </div>
                            <div class="form-group">
                                <label for="display_name"><strong class="label-danger">*</strong>Nombre a mostrar</label>
                                <input type="text" name="display_name" id="display_name" class="form-control" required="true" maxlength="191">
                            </div>
                            <div class="form-group">
                                <label for="permission_description">Descripcion</label>
                                <textarea name="description" id="" cols="30" rows="3" maxlength="191" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12" id="other_permission" style="display: none;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                    <button type="button" class="btn btn-default closePermissionModal">
                        Cerrar
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>