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
                    <button style="border-radius: 2em">
                    <a href="{{ route("product.create") }}"><li class="breadcrumb-item active"> Create Product</li></a></button>
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
                        <th style="width: 30%">Image</th>
                        
                        <th style="width: 20%">Type</th>
                        {{-- <th style="width: 20%">Action</th> --}}
                        <th></th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        
                        <td>@if ($item->photo != null)
                            <img src="{{ asset('images') . '/' . $item->photo }}" alt="{{ $item->name }}" style="width:200px;height: auto;">
                            @endif
                        </td>
                        
                        <td>{{ $item->type }}</td>
                       
                         {{-- <td>
                          @if ($item->active == 0)
                          <a href=""class="thumbs-down" ui-toggle-class=""><i class="fa fa-thumbs-down " aria-hidden="true" style="color: red"></i>
                          @else
                          <a href=""class="thumbs-up" ui-toggle-class=""><i class="fa fa-thumbs-up " aria-hidden="true" style="color: greenyellow"></i>
                          
                              
                          @endif
                        </td> --}}
                        <td>
                            <a href=""class="active" ui-toggle-class="">
                                <form action="{{ route('product.destroy', $item->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                             @method('DELETE')
                            <input type="hidden" name="id" value="{{ $item->id }}"/>
                            <input type="submit" value="Delete" class="btn btn-default">

                               

                            </a>
                        </td>
                        <td>
                           
                               
                            <td><a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary" >Edit</a>

                           
                        </td>
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