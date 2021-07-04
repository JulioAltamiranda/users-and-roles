@extends('admin.layouts.app')
@section('content')
    <div class="alert alert-primary alert-dismissable show fade" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        Welcome to <strong>{{ auth()->user()->name }}!</strong>.
    </div>
@endsection
