@extends('admin.layout.layout')
@section('contents')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li> --}}
                        <button style="border-radius: 2em">
                            <a href="{{ route('ProductList') }}">
                                <li class="breadcrumb-item active"> Product List
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
                <h3 class="card-title"></h3>

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
                    <div class="title">Registration</div>
                    <div class="content">
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $err)
                                <p class="alert alert-danger"> {{ $err }}</p>
                            @endforeach
                        @endif
                        <form method="POST" action="{{ url('admin/createuser') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Email <span class="text-danger">*</span></span>
                                    <input type="text" placeholder="Enter your email" name="email"
                                        value="{{ old('email') }}">
                                </div>
                                <div class="input-box">
                                    <span class="details">Full Name </span>
                                    <input type="text" placeholder="Enter your name" name="fullname"
                                        value="{{ old('fullname') }}">
                                </div>
                                <div class="input-box">
                                    <span class="details">Password <span class="text-danger">*</span></span>
                                    <input type="password" placeholder="Enter your password" name="password">
                                </div>
                                <div class="input-box">
                                    <span class="details">Confirm Password <span class="text-danger">*</span></span>
                                    <input type="password" placeholder="Confirm your password" name="password_confirmation">
                                </div>

                                <div class="input-box">
                                    <span class="details">Phone Number</span>
                                    <input type="text" placeholder="Enter your number" name="phone"
                                        value="{{ old('phone') }}">
                                </div>
                                <div class="input-box">
                                    <span class="details">Address</span>
                                    <input type="text" placeholder="Enter your Address" name="address"
                                        value="{{ old('address') }}">
                                </div>
                            </div>
                            <div>
                                <span class="details">Role <span class="text-danger">* </span></span>
                                <select name="role">
                                    <option value="0">Please choose one</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                                {{-- <input type="text" placeholder="Enter 1 for admin and 2 for user)" name="role" id="role" value="{{ old('role') }}"> --}}
                            </div>
                            <div>
                                <span class="details">Active: <span class="text-danger">* </span></span>
                                <select name="active">
                                    <option value="0">Please choose one</option>
                                    <option value="1">Active</option>
                                    <option value="2">Disable</option>
                                </select>
                            </div>

                            <div>Image: 
                                <input type="file" name="image">
                            </div>

                            <div class="button">
                                <input type="submit" value="Register">
                            </div>
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
