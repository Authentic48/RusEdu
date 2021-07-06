@extends('frontend.layouts.app')

@section('content')
<div class="section-full content-inner-2 shop-account">
    <!-- Product -->
    <div class="container">
        <div>
            <div class="max-w500 m-auto m-b30">
                <div class="p-a30 border-1 seth">
                    <div class="tab-content nav">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                       <form id="forgot-password" class="tab-pane active col-12 p-a0 " method="POST"
                            action="{{ route('password.update') }}">
                            @csrf
                            <h4 class="font-weight-700">Сброс пароля</h4>
                             <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Новый пароль">
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Подтвердите Пароль">
                            </div>
                            <div class="text-left">
                                <button class="site-button button-lg">Сброс пароля</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

