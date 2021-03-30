@extends('admin.master')

@section('content')

<div class="section-header">
    <h1>Reports</h1>
    <nav class="section-header-breadcrumb">
        <a class="breadcrumb-item" href="/dashboard">Dashboard</a>
        <span class="breadcrumb-item active">Reports</span>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">            
        <div class="card">
            <div class="card-header row">                    
                <div class="col-6 text-left">
                    Print Reports
                </div>                     
            </div>                
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <table class="table table-striped text-center" id="datatable">
                            <thead>
                                <tr>                            
                                    <th>Print Report</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                                            
                                    <td>Outlets</td>
                                    <td>
                                        <a href="/" class="btn btn-danger btn-sm">
                                            PDF
                                        </a>
                                        <a href="/" class="btn btn-success btn-sm">
                                            XLS
                                        </a>
                                    </td>
                                </tr>
                                <tr>                            
                                    <td>Employees</td>
                                    <td>
                                        <a href="/" class="btn btn-danger btn-sm">
                                            PDF
                                        </a>
                                        <a href="/" class="btn btn-success btn-sm">
                                            XLS
                                        </a>
                                    </td>
                                </tr>
                                <tr>                            
                                    <td>Products</td>
                                    <td>
                                        <a href="/" class="btn btn-danger btn-sm">
                                            PDF
                                        </a>
                                        <a href="/" class="btn btn-success btn-sm">
                                            XLS
                                        </a>
                                    </td>
                                </tr>
                                <tr>                            
                                    <td>Members</td>
                                    <td>
                                        <a href="/" class="btn btn-danger btn-sm">
                                            PDF
                                        </a>
                                        <a href="/" class="btn btn-success btn-sm">
                                            XLS
                                        </a>
                                    </td>
                                </tr>                        
                            </tbody>
                        </table>
                    </div>

                    <div class="col-6 float-right mb-5">
                        <div class="card border border-primary">
                            <div class="card-header border-primary">
                                <h4>Print Transaction</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Choose date to filter print</h5>
                                <p class="card-text">
                                    <div class="row">
                                        <div class="col-6 mt-3">
                                            <label for="">From :</label>
                                            <input type="date" name="" id="from" class="form-control">
                                        </div>
                                        <div class="col-6 mt-3">
                                            <label for="">To :</label>
                                            <input type="date" name="" id="from" class="form-control">
                                        </div>
                                        <div class="col-6 mt-2">
                                            <small style="color: red">*clear filter to print all</small>
                                        </div>
                                        <div class="col-12 mt-4 text-center">
                                            <button class="btn btn-danger">PDF</button>
                                            <button class="btn btn-success">XLS</button>
                                        </div>
                                    </div>                                    
                                </p>                                
                            </div>                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection