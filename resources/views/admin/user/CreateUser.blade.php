@extends('admin.layout.layout')
@section('contents')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1>Create User</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                       
                        <button style="border-radius: 2em">
                            <a href="{{ route('ProfileList') }}">
                                <li class="breadcrumb-item active"> User List
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
                <h2 class="card-title">REGISTRATION</h2>

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
                <div class="container_register">

                    <div class="content">
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $err)
                                <p class="alert alert-danger"> {{ $err }}</p>
                            @endforeach
                        @endif
                        <form method="POST" action="{{route('addUser') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="Input your email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="fullname">Full name </label>
                                <input type="text" id="fullname" name="fullname" class="form-control"
                                    placeholder="Input your full name" value="{{ old('fullname') }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Password <span class="text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Input your password" value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" placeholder="Type your password again"
                                    value="{{ old('password_confirmation') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" id="phone" name="phone" class="form-control"
                                    placeholder="Input your phone" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control"
                                    placeholder="Input your address" value="{{ old('address') }}">
                            </div>
                            <div class="form-group">
                                <label for="role">Role <span class="text-danger">* </span> </label>
                                <select name="role" id="role">
                                    <option value="0">Please choose one</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="active">Active <span class="text-danger">* </span> </label>
                                <select name="active" id="active">
                                    <option value="0">Please choose one</option>
                                    <option value="1">Active</option>
                                    <option value="2">Disable</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" value="{{ old('image') }}">
                            </div>

                            <input type="submit" value="Register" class="btn btn-outline-success">

                        </form>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
@section('myjs')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection
