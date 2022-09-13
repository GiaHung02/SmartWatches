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
                    {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                    <li class="breadcrumb-item active">Product</li>
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
            <h3 class="card-title">Product</h3>

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
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 5%">Id</th>
                        <th style="width: 20%">Name</th>
                        <th style="width: 15%">Price</th>
                        <th style="width: 40%">Image</th>
                        <th style="width: 20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prods as $item)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>@if ($item->photo != null)
                            <img src="{{ asset('images') . '/' . $item->photo }}" alt="{{ $item->name }}" style="width:200px;height: auto;">
                            @endif
                        </td>
                        <td></td>
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