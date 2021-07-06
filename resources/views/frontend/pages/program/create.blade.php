@extends('frontend.layouts.app')


@section('content')
@if(session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="section-full bg-white submit-resume content-inner-2">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('program.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>название программы *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="Your Full Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>категория *</label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror" name="category"
                        value="{{ old('category') }}" placeholder="Дети">
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>уровень *</label>
                    <input type="text" class="form-control @error('level') is-invalid @enderror" name="level"
                        value="{{ old('level') }}" placeholder="Beginner">
                    @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>цена *</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}" placeholder="4000">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Фото </label>
                    <div class="custom-file">
                        <input type="file" name="image" class="site-button @error('image') is-invalid @enderror"
                            id="customFile">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
                <div class="invisible">
                    <label>user_id</label>
                    <input type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}"
                        placeholder="user_id">
                </div>
                <button type="submit" class="site-button">Создайте</button>
            </form>
        </div>
    </div>

</div>


@endsection
