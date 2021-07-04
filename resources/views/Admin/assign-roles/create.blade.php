@extends('admin.layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.assign-roles.index') }}">Assign roles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Assign role</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Assign role</div>
        <div class="card-body">
            <form action="{{ route('admin.assign-roles.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_id">Users</label>
                    <select name="user_id" id="user_id" class="form-control @error('user_id')
                    is-invalid @enderror">
                        <option value="">Select a user</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label>Select one or more role</label>
                @foreach ($roles as $role)
                    <div class="form-check form-group">
                        <input class="form-check-input" name="roles[]" type="checkbox"
                            {{ collect(old('roles'))->contains($role->id) ? 'checked' : '' }} value="{{ $role->id }}"
                            id="defaultCheck{{ $role->id }}">
                        <label class="form-check-label" for="defaultCheck{{ $role->id }}">
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
