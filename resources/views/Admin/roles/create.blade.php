@extends('admin.layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.roles.create') }}">Roles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create role</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">New role</div>
        <div class="card-body">
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="name" value="{{ old('name') }}" class="form-control @error('name')
             		is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
