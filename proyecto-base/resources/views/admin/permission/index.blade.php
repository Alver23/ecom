@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <button type="button" class="btn btn-primary" id="buttonFormPermission" data-toggle="modal" data-target="#formPermissionModal"><i class="glyphicon glyphicon-plus"></i> Nuevo Registro </button>
                </button>
            </div>
        </div>
        @include('admin.permission.table')
    </div>
@endsection
