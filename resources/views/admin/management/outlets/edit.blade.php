@extends('admin.master')

@section('content')

<div class="section-header">
    <h1>Outlets</h1>
    <nav class="section-header-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('admin.outlet.index') }}">Outlets</a>
        <span class="breadcrumb-item active">Edit</span>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">            
        <div class="card">
            <div class="card-header row">                    
                <div class="col-6 text-left">
                    Edit Outlets
                </div>                
            </div>                

            <form action="{{ route('admin.outlet.update', ['outlet' => $outlet['id']]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Outlet Name</label>
                                <input type="text" name="outlet_name" id="outlet_name" class="form-control @error('outlet_name') is-invalid @enderror" value="{{ old('outlet_name') ?? $outlet['name'] }}" aria-describedby="helpId" autofocus>
                                <div class="invalid-feedback">@error('outlet_name') {{ $message }} @enderror</div>
                            </div>
                        </div>                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="number" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') ?? $outlet['phone'] }}" aria-describedby="helpId">
                                <div class="invalid-feedback">@error('phone_number') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?? $outlet['address'] }}" aria-describedby="helpId">
                                <div class="invalid-feedback">@error('address') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        @php $old_city = old('city') ?? $outlet['city']; @endphp
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">City</label>
                                <select name="city" id="city" class="form-control @error('city') is-invalid @enderror">
                                    <option value="">Choose city</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->nama }}" @if($old_city == $city->nama) selected @endif>{{ $city->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">@error('city') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="Active" class="selectgroup-input" @if(old('status') == "Active") checked @endif>
                                        <span class="selectgroup-button selectgroup-button-icon">Active</span>
                                    </label>
    
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="Unactive" class="selectgroup-input" @if(old('status') == "Unactive") checked @endif @if(empty(old('status'))) checked @endif>
                                        <span class="selectgroup-button selectgroup-button-icon">Unactive</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="card-footer text-right">
                    <a href="{{ route('admin.outlet.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary ml-2">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection