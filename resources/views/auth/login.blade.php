@extends('frontend.layouts.app')

@section('content')
<!-- inner page banner -->
<div class="dez-bnr-inr overlay-black-middle bg-pt"
    style="background-image:url({{ asset('assets/images/banner/bnr2.jpg') }});">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">логин</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="#">Главная страница</a></li>
                    <li>логин</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->
<!-- contact area -->
<div class="section-full content-inner-2 shop-account">
    <!-- Product -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="font-weight-700 m-t0 m-b20">войдите в свой аккаунт</h3>
            </div>
        </div>
        <div>
            <div class="max-w500 m-auto m-b30">
                <div class="p-a30 border-1 seth">
                    <div class="tab-content nav">
                        <form id="login" class="tab-pane active col-12 p-a0 " method="POST"
                            action="{{ route('login') }}">
                            @csrf
                            <h4 class="font-weight-700">{{ __('Login') }}</h4>
                            <p class="font-weight-600">Если у вас есть аккаунт с нами, пожалуйста, войдите.</p>
                            <div class="form-group">
                                <label class="font-weight-700">Эл. адрес *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}"
                                    placeholder="Ваш электронный адрес" type="email">
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
                                     placeholder="Введите пароль" type="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    Запомни меня
                                </label>
                            </div>
                            <div class="text-left">
                                <button class="site-button m-r5 button-lg">логин</button>
                                @if(Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="m-l5"><i class="fa fa-unlock-alt"></i>
                                        Забыли Ваш пароль? </a>
                                @endif
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
</div>
<!-- Content END-->
@endsection


