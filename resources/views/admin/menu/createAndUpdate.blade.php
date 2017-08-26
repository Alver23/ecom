<div class="modal fade" id="formMenuModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close closeMenuModal">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Menus</h4>
            </div>
            <form action="{{ route('menus.store') }}" method="post" id="formMenu">
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
                                <label for="menu_id">{{ trans('message.attributes.parent_menu') }}</label>
                                <select name="parent_menu_id" id="menu_id" class="form-control">
                                    <option value="">[Seleccione una opcion]</option>
                                    @foreach($parentMenus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">{{ trans('message.attributes.name') }}</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="url">{{ trans('message.attributes.url') }}</label>
                                <input type="text" name="url" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="orden">{{ trans('message.attributes.order') }}</label>
                                <input type="text" name="orden" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="buttonMenu">
                        {{ trans('message.buttons.save') }}
                    </button>
                    <button type="button" class="btn btn-default closeMenuModal">
                        {{ trans('message.buttons.close') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>