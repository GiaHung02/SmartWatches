@extends('admin.layout.layout')
@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product</h1>
            </div>  
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li> --}}
                    <li class="breadcrumb-item active">Create New</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif 
        <div class="card-header">
            <h3 class="card-title">Create New</h3>

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
            <form action="{{ route('Product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" class="form-control ">
                </div>
                <div class="form-group">
                    <label for="short_desc">Short Description</label>
                    <input type="text" id="short_desc" name="short_desc" class="form-control ckeditor">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control ckeditor"></textarea>
                </div>
                {{-- <div class="form-group">
                    <label for="category">Category</label>
                    <select id="inputStatus" class="form-control custom-select">
                        <option selected disabled>Select one</option>
                    </select>
                </div> --}}
                <div class="form-group">
                    <label for="inputName">Photo</label>
                    <input type="file" id="photo" name="photo" class="form-control">
                </div>
              
                <div class="form-group">
                    <label for="type">Type</label>  
                    <select name="type" id="type">type
                        <option value="apple">Apple</option>
                        <option value="Samsung">Samsung</option>
                        <option value="Garmin">Garmin</option>
                        <option value="Xiaomi">Xiaomi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Active">Active</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1"  type="radio" id="active" name="active" >
                        <label for="active" class="custom-control-label">YES</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0"  type="radio" id="no_active" name="active" >
                        <label for="no_active" class="custom-control-label">No</label>
                    </div>
                </div>

              
                <input type="submit" value="Create New Project" class="btn btn-outline-success">
            </form>

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