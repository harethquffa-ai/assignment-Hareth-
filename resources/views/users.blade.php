<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Users Management</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('users.index') }}">
                <div class="sidebar-brand-text mx-3">SB Admin 2</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <span class="h5 mb-0 text-gray-800">Users CRUD</span>
                </nav>

                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Add User</button>
                            </form>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>
                                                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="d-flex flex-wrap align-items-center">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control form-control-sm mr-2 mb-1" style="width: 150px;" required>
                                                </td>
                                                <td>
                                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control form-control-sm mr-2 mb-1" style="width: 190px;" required>
                                                        <input type="password" name="password" placeholder="New Password (optional)" class="form-control form-control-sm mr-2 mb-1" style="width: 170px;">
                                                </td>
                                                <td>
                                                        <button type="submit" class="btn btn-success btn-sm mb-1">Update</button>
                                                    </form>

                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>