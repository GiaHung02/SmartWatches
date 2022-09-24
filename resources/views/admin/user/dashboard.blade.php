@extends('admin.layout.layout')
@section('contents')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dash board</h3>
                <h3><a href="{{ url('admin/displayAddUser') }}">Create New Account</a></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <h1>Account List</h1>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Fullname</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Actions</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                            <tr>
                                <td>{{ $u->account_id }}</td>

                                <td>
                                    @if ($u->image != null)
                                        <img src="image/{{ $u->image }}" width="100px" alt="photo">
                                    @endif
                                </td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->fullname }}</td>
                                <td>{{ $u->phone }}</td>
                                <td>{{ $u->role == 1 ? 'Admin' : 'User' }}</td>
                                <td>{{ $u->active == 1 ? 'Active' : 'Disable' }}</td>
                                <td><a href="{{url("admin/resetPassword/{$u->account_id}")}}">Reset Password</a></td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
