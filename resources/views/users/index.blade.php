@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Semua Admin</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Photo</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Phone</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alamat</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            About Me</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Role</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($admins as $admin)
                                        <tr>
                                            <td class="ps-4">{{ $admin->id }}</td>
                                            <td>
                                                @if ($admin->foto)
                                                    <img src="{{ asset($admin->foto) }}" alt="" width="50" height="50" class="rounded">
                                                @else
                                                    <img src="{{ asset('default-image.png') }}" alt="belum konek database"
                                                        width="50">
                                                @endif
                                            </td>
                                            <td class="text-center text-sm">{{ $admin->name }}</td>
                                            <td class="text-center text-sm">{{ $admin->email }}</td>
                                            <td class="text-center text-sm">{{ $admin->phone }}</td>
                                            <td class="col-1 text-center text-sm text-break">{{ $admin->location }}</td>
                                            <td class="text-center text-sm text-break">{{ $admin->about_me }}</td>
                                            <td class="text-center text-sm">{{ $admin->role }}</td>
                                            <td class="text-center text-sm">
                                                <a href="{{ route('users.edit', $admin->id) }}" class=""
                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                    <i class="fas fa-user-edit text-secondary mt-3"></i>
                                                </a>
                                                <form action="{{ route('users.destroy', $admin->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-secondary"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Delete user">
                                                        <i class="fas fa-trash text-secondary mt-3"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada admin</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Semua User</h5>
                            </div>
                            <a href="{{ route('users.create') }}" class="btn bg-gradient-primary btn-sm mb-0"
                                type="button">+&nbsp; New User</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Photo</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Phone</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alamat</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            About Me</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Role</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td class="ps-4">{{ $user->id }}</td>
                                            <td>
                                                <img src="{{ asset($user->foto) }}" alt="foto user" class="text-xs rounded" width="50">
                                            </td>
                                            <td class="text-center text-sm">{{ $user->name }}</td>
                                            <td class="text-center text-sm">{{ $user->email }}</td>
                                            <td class="text-center text-sm">{{ $user->phone }}</td>
                                            <td class="col-1 text-center text-sm text-break">{{ $user->location }}</td>
                                            <td class="text-center text-sm text-break">{{ $user->about_me }}</td>
                                            <td class="text-center text-sm">{{ $user->role }}</td>
                                            <td class="text-center text-sm">
                                                <a href="{{ route('users.edit', $user->id) }}" class=""
                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                    <i class="fas fa-user-edit text-secondary mt-3"></i>
                                                </a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-secondary"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Delete user">
                                                        <i class="fas fa-trash text-secondary mt-3"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada user</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
