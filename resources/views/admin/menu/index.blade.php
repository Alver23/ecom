@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <button type="button" class="btn btn-primary" id="formButtonMenu">
                {{ trans('message.buttons.new_register') }}
            </button>
        </div>
        @include('admin.menu.table')
    </div>
    @include('admin.menu.createAndUpdate')
@endsection
@push('scripts')
    <script src="{{ asset('js/menu/index.js') }}?v= {{ time() }}"></script>
    <script src="{{ asset('js/menu/createAndUpdate.js') }}?v= {{ time() }}"></script>
    <script src="{{ asset('js/menu/delete.js') }}?v= {{ time() }}"></script>
    <script src="{{ asset('js/menu/edit.js') }}?v= {{ time() }}"></script>
    <script src="{{ asset('js/menu/dataTable.js') }}?v= {{ time() }}"></script>
@endpush