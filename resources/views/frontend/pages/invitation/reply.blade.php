@extends('frontend.layouts.app')

@section('content')
<div class="section-full bg-white submit-resume content-inner-2">
    <div class="container">
        <div class="col-md-6 offset-md-3">
           <form action="{{ route('invitation.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                    <label> электронная почта заявителя *</label>
                    <input type="text" class="form-control @error('to') is-invalid @enderror" name="to"
                        value="{{ old('to') }}" placeholder="адрес электронной почты заявителя">
                    @error('to')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> тема *</label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject"
                        value="{{ old('subject') }}" placeholder="об этом письме">
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                 <div class="form-group">
                    <label> сообщение *</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                         placeholder="скажите что-то"> {{ old('message') }}</textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              <button type="submit" class="site-button">Отправить</button>
            <a type="button" href="{{ route('invitations')}}" class="btn btn-outline-danger">отменить</a>

           </form>
        </div>
    </div>
</div>
@endsection
