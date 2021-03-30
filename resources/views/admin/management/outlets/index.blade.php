@extends('admin.master')

@section('content')
    <div class="section-header">
        <h1>Outlets</h1>
        <nav class="section-header-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="breadcrumb-item active">Outlets</span>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">            
            <div class="card">
                <div class="card-header row">                    
                    <div class="col-6 text-left">
                        Outlets Data
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('admin.outlet.create') }}" class="btn btn-outline-primary rounded">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add
                        </a>
                    </div>                      
                </div>          
                
                <div class="card-body">
                    <table class="table table-striped text-center" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Outlet Name</th>                                
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Outlet City</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @forelse ($outlets as $outlet)
                            @php $i++; @endphp
                                <tr>
                                    <td scope="row">{{ $i }}</td>                                
                                    <td>{{ $outlet['name'] }}</td>                                
                                    <td>{{ $outlet['phone'] }}</td>
                                    <td>{{ $outlet['address'] }}</td>
                                    <td>{{ $outlet['city'] }}</td>
                                    <td>
                                        <div class="badge {{ $outlet['status'] == "Active" ? 'badge-success' : 'badge-danger' }} badge-status">
                                            {{ $outlet['status'] }}
                                        </div>    
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.outlet.edit', ['outlet' => $outlet['id']] ) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#destroy-{{ $outlet['id'] }}">
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

    {{-- <script type="text/javascript">
        $('.datatable').DataTable();
    </script> --}}
@endsection

@section('modal')
    @foreach ($outlets as $outlet)
    <div class="modal fade" id="destroy-{{ $outlet['id'] }}" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Outlet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this outlet?
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th>Outlet Name</th>
                            <td>{{ $outlet['name'] }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $outlet['phone'] }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $outlet['address'] }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $outlet['city'] }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('admin.outlet.destroy', ['outlet' => $outlet['id']]) }}" method="post">
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