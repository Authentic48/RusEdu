@extends('frontend.layouts.app')

@section('content')
        	@if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
            @endif
	    <div class="section-full bg-white submit-resume content-inner-2">
				<div class="container">
                    <form method="post" action="{{ route('student.update', $post->id) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
						<div class="form-group">
							<label>Имя</label>
                            <input type="text" name="name" value="{{ $post->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Имя">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<label>Эл. почта</label>
                            <input type="email"  name="email" value="{{ $post->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="info@gmail.com">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<label>Город</label>
							<input type="text" name="city" value="{{ $post->city}}" class="form-control @error('city') is-invalid @enderror" placeholder="Москва">
                           @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
				      <div class="form-group">
							<label>Заголовок поста</label>
							<input type="text" name="title" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror" placeholder="Заголовок">
                           @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
						<div class="form-group">
							<label>Kонтент</label>
							<textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Kонтент....."> {{ $post->content }}</textarea>
                          @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="invisible">
							<input type="text" name="user_id" value="{{ Auth()->user()->id }}" class="form-control">
						</div>
						<button type="submit" class="site-button">Cохранять</button>
					</form>
				</div>
			</div>
@endsection