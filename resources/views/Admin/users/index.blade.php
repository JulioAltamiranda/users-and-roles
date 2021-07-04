@extends('admin.layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Users</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-white text-black">
            Users
        </div>
        <div class="card-body">
            <div class="row p-3 pb-4 justify-content-end">
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm"><i
                class="fas fa-plus mr-2"></i>Add user</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <caption>User list</caption>
                    <thead>
                        <tr>
                            <th class="w-25">Name</th>
                            <th class="w-25">Email</th>
                            {{-- <th class="w-25">Roles</th> --}}
                            <th class="w-25">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="btn-groups">
                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.users.edit', $user) }}"><i
                                        class="fas fa-edit text-white"></i></a>
                                    <form class="d-inline" action="{{ route('admin.users.destroy', $user) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
