@extends('admin.layout.layout')
@section('contents')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button style="border-radius: 2em">
                            <a href="{{ route('createuser') }}">
                                <li class="breadcrumb-item active">Create New User
                            </a></button>
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
                <table style="">
                    <thead>
                        <tr>
                            <th style="width: 1%">ID</th>
                            <th style="width: 1%">Image</th>
                            <th style="width: 2%">Email</th>
                            <th style="width: 2%">Fullname</th>
                            <th style="width: 2%">Phone</th>
                            <th style="width: 2%">Role</th>
                            <th style="width: 2%">Actions</th>
                            
                            <th style="width: 5%">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                            <tr>
                                <td>{{ $u->account_id }}</td>
                                <td>
                                    @if ($u->image != null)
                                        <img src="image/{{ $u->image }}" width="500px" alt=" avatar">
                                    @endif
                                </td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->fullname }}</td>
                                <td>{{ $u->phone }}</td>
                                <td>{{ $u->role == 1 ? 'Admin' : 'User' }}</td>
                                <td>{{ $u->active == 1 ? 'Active' : 'Disable' }}</td>
                                <td>{{ $u->address }}</td>

                                {{-- <td><a href="{{url("admin/resetPassword/{$u->account_id}")}}">Reset Password</a></td> --}}
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
