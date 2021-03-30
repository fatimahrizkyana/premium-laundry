@extends('admin.master')

@section('content')

<div class="section-header">
    <h1>Employees</h1>
    <nav class="section-header-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('admin.employee.index') }}">Employees</a>
        <span class="breadcrumb-item active">Edit</span>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">            
        <div class="card">
            <div class="card-header row">                    
                <div class="col-6 text-left">
                    Edit Employees
                </div>
            </div>                

            <form action="{{ route('admin.employee.update', ['employee' => $employee['id']]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Fullname</label>
                                <input type="text" name="fullname" id="fullname" class="form-control @error('fullname') is-invalid @enderror" value="{{ old('fullname') ?? $employee['fullname']}}" aria-describedby="helpId" autofocus>                                
                                <div class="invalid-feedback">@error('fullname') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error ('email') is-invalid @enderror" value="{{ old('email') ?? $employee ['email'] }}" aria-describedby="helpId" autofocus>                                
                                <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" id="password" class="form-control @error ('password') is-invalid @enderror" value="{{ old('password') }}" aria-describedby="helpId" autofocus autocomplete="off">                                
                                <div class="invalid-feedback">@error('password') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="number" name="phone_number" id="phone_number" class="form-control @error ('phone_number') is-invalid @enderror" value="{{ old('phone_number') ?? $employee ['phone'] }}" aria-describedby="helpId" autofocus>                                
                                <div class="invalid-feedback">@error('phone_number') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        @php $old_role = old('role') ?? $employee['role'] @endphp
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Role</label>
                                <select name="role" id="" class="form-control">
                                    <option value="">Choose Role</option>
                                    <option value="Owner" @if($old_role == "Owner") selected @endif>Owner</option>
                                    <option value="Admin" @if($old_role == "Admin") selected @endif>Admin</option>
                                    <option value="User" @if($old_role == "User") selected @endif>User</option>
                                </select>
                            </div>
                        </div>
                        @php $old_outlet = old('outlet') ?? $employee['outlet_id'] @endphp
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Outlet</label>
                                <select name="outlet" id="" class="form-control @error('outlet') is-invalid @enderror">
                                    <option value="">Choose Outlet</option>
                                    @foreach ($outlets as $outlet)
                                        <option value="{{ $outlet['id'] }}" @if($old_outlet == $outlet['id']) selected @endif>
                                            {{ $outlet['name'] . " - " . $outlet['city'] }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">@error ('outlet') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <a href="{{ route('admin.employee.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary ml-2">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection