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
                            action="{{ route('password.email') }}">
                            @csrf
                            <h4 class="font-weight-700">ЗАБЫЛИ ПАРОЛЬ ?</h4>
                            <p class="font-weight-600">Мы вышлем вам письмо для сброса пароля. </p>
                            <div class="form-group">
                                <label class="font-weight-700">ЭЛ. ПОЧТА *</label>
                                <input name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Ваш адрес электронной почты" type="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-left">
                                <a class="site-button outline gray button-lg" href="{{ route('login') }}">Back</a>
                                <button class="site-button pull-right button-lg">Отправить</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

