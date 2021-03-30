@extends('admin.master')

@section('content')

<div class="section-header">
    <h1>Products</h1>
    <nav class="section-header-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('admin.product.index') }}">Outlets</a>
        <span class="breadcrumb-item active">Add</span>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">            
        <div class="card">
            <div class="card-header row">                    
                <div class="col-6 text-left">
                    Edit Products
                </div>                
            </div>                

            <form action="{{ route('admin.product.update', ['product' => $product['id']]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Type</label>
                                <input type="text" name="type" id="type" class="form-control @error ('type') is-invalid @enderror" value="{{ old('type') ?? $product['type']}}" aria-describedby="helpId" autofocus>                                
                                <div class="invalid-feedback">@error('type') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="price" id="price" class="form-control @error ('price') is-invalid @enderror" value="{{ old('price') ?? $product['price'] }}" aria-describedby="helpId" autofocus>                                
                                <div class="invalid-feedback">@error('price') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Discount</label>
                                <input type="number" name="discount" id="discount" class="form-control @error ('discount') is-invalid @enderror" value="{{ old('discount') ?? $product['discount'] }}" aria-describedby="helpId" autofocus>                                
                                <div class="invalid-feedback">@error('discount') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        @php $old_outlet = old('outlet') ?? $product['outlet_id'] @endphp
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
                    <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary ml-2">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection