@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <button type="button" class="btn btn-primary" id="buttonFormPermission"><i class="glyphicon glyphicon-plus"></i> Nuevo Registro </button>
                </button>
            </div>
        </div>
        @include('admin.permission.table')
    </div>
    @include('admin.permission.createAndUpdate')
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/permission/index.js') }}"></script>
    <script src="{{ asset('js/admin/permission/dataTable.js') }}"></script>
    <script src="{{ asset('js/admin/permission/createAndUpdate.js') }}"></script>
@endpush
