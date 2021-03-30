@extends('admin.master')

@section('content')
    <div class="section-header">
        <h1>Employees</h1>
        <nav class="section-header-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="breadcrumb-item active">employees</span>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">            
            <div class="card">
                <div class="card-header row">                    
                    <div class="col-6 text-left">
                        Employees Data
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('admin.employee.create') }}" class="btn btn-outline-primary rounded">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add
                        </a>
                    </div>                      
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Fullname</th>
                                <th>Email</th>                                
                                <th>Phone Number</th>
                                <th>Role</th>
                                <th>Outlet</th>
                                <th>Action</th>                              
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @forelse ($employees as $employee)
                            @php $i++ @endphp                                                                                                                                                                        
                            <tr>
                                <td scope="row">{{ $i }}</td>                                
                                <td>{{ $employee['fullname'] }}</td>
                                <td>{{ $employee['email'] }}</td>                                
                                <td>{{ $employee['phone'] }}</td>
                                <td>{{ $employee['role'] }}</td>
                                <td>{{ $employee['outlet'] }}</td>                                
                                <td>
                                    <a href="{{ route('admin.employee.edit', ['employee' => $employee['id']] ) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#destroy-{{ $employee['id'] }}">
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
    @foreach ($employees as $emplyee)
    <div class="modal fade" id="destroy-{{ $employee['id'] }}" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this employee?
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th>Fullname</th>
                            <td>{{ $employee['fullname'] }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $employee['email'] }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $employee['phone'] }}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>{{ $employee['role'] }}</td>
                        </tr>
                        <tr>
                            <th>Outlet</th>
                            <td>{{ $employee['outlet'] }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('admin.employee.destroy', ['employee' => $employee['id']]) }}" method="post">
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