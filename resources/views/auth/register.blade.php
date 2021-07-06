@extends('frontend.layouts.app')

@section('content')
<!-- inner page banner -->
<div class="dez-bnr-inr overlay-black-middle bg-pt"
    style="background-image:url({{ asset('assets/images/banner/bnr2.jpg') }});">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">регистрация</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>регистрация</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->
<!-- contact area -->
<div class="section-full content-inner shop-account">
    <!-- Product -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="font-weight-700 m-t0 m-b20">завести аккаунт</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 m-b30">
                <div class="p-a30 border-1  max-w500 m-auto">
                    <div class="tab-content">
                        <form method="POST" action="{{ route('register') }}" class="tab-pane active">
                            @csrf
                            <h4 class="font-weight-700">ПЕРСОНАЛЬНЫЕ ДАННЫЕ</h4>
                            <p class="font-weight-600">Если у вас есть аккаунт с нами, пожалуйста, войдите.</p>
                            <div class="form-group">
                                <label class="font-weight-700">имя *</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name"
                                    placeholder="имя">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-700">Зарегистрируйтесь как *</label>
                                <select name="role">
                                    <option value="school" >школа</option>
                                    <option value="teacher">учитель, инструктор или тренер</option>
                                    <option value="student">гость</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-700">Эл. адрес *</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required
                                    autocomplete="email" placeholder="Ваш электронный адрес">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-700">пароль *</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="Введите пароль">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-700">Подтвердите Пароль *</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="Подтвердите пароль">
                            </div>
                            <div class="text-left">
                                <button type="submit" class="site-button button-lg outline outline-2">СОЗДАЙТЕ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product END -->
</div>
<!-- contact area  END -->
@endsection