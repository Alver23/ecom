@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" id="formButtonRole">{{ trans('message.buttons.new_register') }}</button>
            </div>
        </div>
        @include('role.table')
        @include('role.createAndUpdate')
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/role/index.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('js/role/createAndUpdate.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('js/role/dataTable.js') }}?v={{ time() }}"></script>
@endpush