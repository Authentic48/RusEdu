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
        <form method="POST" action="{{ route('branche.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>город *</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city">
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>адрес *</label>
                <input type="address"  id="address" class="form-control @error('address') is-invalid @enderror" name="address">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Телефон *</label>
                <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone">
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