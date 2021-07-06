@extends('frontend.layouts.app')

@section('content')
  <!-- inner page banner -->
<div class="dez-bnr-inr overlay-black-middle bg-pt"
style="background-image:url({{ asset('assets/images/banner/bnr2.jpg') }});">
<div class="container">
    <div class="dez-bnr-inr-entry">
        <h1 class="text-white">Поддержка и отзывы</h1>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <ul class="list-inline">
                <li><a href="#">Главная страница</a></li>
                <li>Поддержка и отзывы</li>
            </ul>
        </div>
        <!-- Breadcrumb row END -->
    </div>
</div>
</div>

<div class="section-full bg-white submit-resume content-inner-2">
    <div class="container">
        <form method="POST" action="{{ route('support.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>имя *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ Auth::user()->name }}" placeholder="Your Full Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Эл. адрес *</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ Auth::user()->email }}" placeholder="info@gmail.com">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>сообщение*</label>
                <textarea  class="form-control @error('content') is-invalid @enderror" name="content"
                     placeholder="скажите что-то">{{ old('content') }}</textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="site-button">Отправить</button>
        </form>
    </div>
</div>
<!-- inner page banner END -->  
@endsection