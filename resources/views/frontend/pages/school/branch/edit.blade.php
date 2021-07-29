@extends('frontend.layouts.app')

@section('content')
<!-- contact area -->
@if(session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<!-- Submit Resume -->
<div class="section-full bg-white submit-resume content-inner-2">
    <div class="container">
        <form method="post" action="{{ route('branche.update', $branch->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label>город *</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                    id="search_form" value="{{ old('city', $branch->city) }}">
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>адрес *</label>
                <input type="address"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $branch->address) }}">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Телефон *</label>
                <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $branch->phone) }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="site-button">Создайте</button>
        </form>
    </div>
</div>
@endsection