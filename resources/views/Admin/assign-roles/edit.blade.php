@extends('admin.layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.assign-roles.index') }}">Assign roles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit role assignment</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Edit role assignment</div>
        <div class="card-body">
            <form action="{{ route('admin.assign-roles.update', $user) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="user_id">Users</label>
                    <select name="user_id" id="user_id" class="form-control @error('user_id')
                        is-invalid @enderror">
                        <option value="">Select a user</option>
                        @foreach ($users as $userSelect)
                            <option value="{{ $userSelect->id }}" {{ old('user_id', $userSelect->id) === $user->id ? 'selected' : '' }}>
                                {{ $userSelect->name }}</option>
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
                        {{ collect(old('roles',$user->roles->pluck('id')))->contains($role->id) ?'checked':'' }} value="{{ $role->id }}"
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
