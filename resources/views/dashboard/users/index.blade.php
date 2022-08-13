@extends('dashboard.layouts.main')

@section('container')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 pb-2 border-bottom">
        <h1 class="h2">Users Management</h1>
    </div>
    <div class="row">
        <div class="justify-content-left col-md-5 mb-2 px-4">
            <a href="/dashboard/users/create" class="btn btn-primary my-3 mb-1"><i class="bi bi-file-earmark-plus-fill"></i>
                Insert New User</a>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end pagination-sm col-md-1 my-4 mb-2">
                {{ $users->links() }}
            </div>
        </div>
    </div>
    @if (session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8 " role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($users->count())
        <div class="table-responsive col-lg-8 px-3">
            <table class="table table-striped table-sm">
                <thead class="align-middle">
                    <tr class="table-info">
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th> Authorization</th>
                        <th class="text-center">Action</th>
                        {{-- <th>Change Password</th> --}}

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <a href="/dashboard/users/{{ $user->id }}/password" class="badge bg-info"><span
                                        data-feather="key"></span></a>
                                <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Are you sure you want to delete this')"><span
                                            data-feather="x-circle"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <P class="text-center fs-4"> Data Not Found</P>
    @endif
@endsection
