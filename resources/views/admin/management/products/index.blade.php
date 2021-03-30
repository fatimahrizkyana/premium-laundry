@extends('admin.master')

@section('content')

<div class="section-header">
    <h1>Products</h1>
    <nav class="section-header-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <span class="breadcrumb-item active">Products</span>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">            
        <div class="card">
            <div class="card-header row">                    
                <div class="col-6 text-left">
                    Products Data
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-outline-primary rounded">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add
                    </a>
                </div>                      
            </div>
            <div class="card-body">
                <table class="table table-striped text-center" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Type Product</th>                                                       
                            <th>Price</th>  
                            <th>Discount</th> 
                            <th>Outlet</th>
                            <th>Action</th>                         
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @forelse ($products as $product)
                        @php $i++ @endphp
                        <tr>
                            <td scope="row">{{ $i }}</td>                                
                            <td>{{ $product['type'] }}</td>                                                        
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['discount'] }}</td> 
                            <td>{{ $product['outlet'] }}</td>                            
                            <td>
                                <a href="{{ route('admin.product.edit', ['product' => $product['id']] ) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#destroy-{{ $product['id'] }}">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No Data Available.</td>                         
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>                        
        </div>
    </div>
</div>
    
@endsection

@section('modal')
    @foreach ($products as $product)
    <div class="modal fade" id="destroy-{{ $product['id'] }}" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this Product?
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th>Type Product</th>
                            <td>{{ $product['type'] }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ $product['price'] }}</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td>{{ $product['discount'] }}</td>
                        </tr> 
                        <tr>                            
                            <th>Outlet</th>
                            <td>{{ $product['outlet'] }}</td>                            
                        </tr>                       
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('admin.product.destroy', ['product' => $product['id']]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection