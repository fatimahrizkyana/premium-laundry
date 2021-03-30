@extends('admin.master')

@section('content')

<div class="section-header">
    <h1>Members</h1>
    <nav class="section-header-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('admin.member.index') }}">Members</a>
        <span class="breadcrumb-item active">Edit</span>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">            
        <div class="card">
            <div class="card-header row">                    
                <div class="col-6 text-left">
                    Edit Members
                </div>                
            </div>                

            <form action="{{ route('admin.member.update', ['member' => $member['id']]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Fullname</label>
                                <input type="text" name="fullname" id="fullname" class="form-control @error ('fullname') is-invalid @enderror" value="{{ old('fullname') ?? $member['fullname'] }}" aria-describedby="helpId" autofocus>                                
                                <div class="invalid-feedback">@error('fullname') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error ('email') is-invalid @enderror" value="{{ old('email') ?? $member['email'] }}" aria-describedby="helpId" autofocus>                                
                                <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" id="password" class="form-control @error ('password') is-invalid @enderror" value="{{ old('password') }}" aria-describedby="helpId" autofocus>                                
                                <div class="invalid-feedback">@error('password') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?? $member['address'] }}" aria-describedby="helpId">
                                <div class="invalid-feedback">@error('address') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        @php $old_city = old('city') ?? $member['city']; @endphp
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
                        @php $old_gender = old('gender') ?? $member['gender']; @endphp
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="Female" class="selectgroup-input" @if($old_gender == "Female") checked @endif>
                                        <span class="selectgroup-button selectgroup-button-icon">Female</span>
                                    </label>    
                                    <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="Male" class="selectgroup-input" @if($old_gender == "Male") checked @endif>
                                        <span class="selectgroup-button selectgroup-button-icon">Male</span>
                                    </label>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="number" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') ?? $member['phone'] }}" aria-describedby="helpId">
                                <div class="invalid-feedback">@error('phone_number') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <a href="{{ route('admin.member.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary ml-2">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection