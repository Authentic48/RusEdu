@extends('frontend.layouts.app')


@section('content')

<!-- inner page banner -->
<div class="dez-bnr-inr overlay-black-middle"
    style="background-image:url({{ asset ('assets/images/banner/bnr1.jpg') }});">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">Связаться с нами</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="{{ route('landing') }}">Home</a></li>
                    <li>Связаться с нами</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->

<!-- contact area -->
<div class="section-full content-inner bg-white contact-style-1">
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <!-- right part start -->
            <div class="col-lg-6 col-md-6 d-lg-flex d-md-flex">
                <div class="p-a30 border m-b30 contact-area border-1 align-self-stretch radius-sm">
                    <h4 class="m-b10">Быстрый контакт</h4>
                    <p>Если у вас есть какие-либо вопросы, просто используйте следующие контактные данные.</p>
                    <ul class="no-margin">
                        <li class="icon-bx-wraper left  m-b30">
                            <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-email"></i></a>
                            </div>
                            <div class="icon-content">
                                <h6 class="text-uppercase m-tb0 dez-tilte">Эл. адрес:</h6>
                                <p>contact@schools-teachers.com</p>
                            </div>
                        </li>
                    </ul>
                    <div class="m-t20">
                        <ul class="dez-social-icon dez-social-icon-lg">
                            <li><a href="#" class="fa fa-facebook bg-primary"></a></li>
                            <li><a href="#" class="fa fa-vk bg-primary"></a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- right part END -->
            <!-- Left part start -->
            <div class="col-lg-6 col-md-6">
                <div class="p-a30 m-b30 radius-sm bg-gray clearfix">
                    <h4>Отправить сообщение нам</h4>

                    <form method="post" action="{{ route('contact.save') }}"
                        enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="ваше имя" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Ваш электронный адрес"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <textarea name="message" rows="4"
                                            class="form-control @error('message') is-invalid @enderror"
                                            placeholder="Ваше сообщение...">{{ old('message') }}</textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="site-button ">Отправить </button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- contact area  END -->


@endsection