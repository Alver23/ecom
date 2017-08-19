<div class="modal fade" id="formRoleModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light-blue-active">
                <button type="button" class="close closeRoleModal">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Roles</h4>
            </div>
            <form action="{{ route('permisos.store') }}" method="post" id="formRole">
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
                                <label for="name">* {{ trans('message.attributes.name') }}</label>
                                <input type="text" name="name" id="name" class="form-control" maxlength="191">
                            </div>
                            <div class="form-group">
                                <label for="display_name">{{ trans('message.attributes.display_name') }}</label>
                                <input type="text" name="display_name" id="display_name" class="form-control"  maxlength="191">
                            </div>
                            <div class="form-group">
                                <label for="role_permission_id">{{ trans('message.attributes.permission') }}</label>
                                <select name="permission_id[]" id="role_permission_id" multiple="true" class="form-control" required="true">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ trans('message.attributes.description') }}</label>
                                <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('message.buttons.save') }}</button>
                    <button type="button" class="btn btn-default closeRoleModal">{{ trans('message.buttons.close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>