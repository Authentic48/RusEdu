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
        <form method="POST" action="{{ route('job.store') }}" enctype="multipart/form-data">
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
                <label>город *</label>
                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                 placeholder="город" value="{{old('city')}}">
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="form-group">
                <label>профессия *</label>
                <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror"
                 placeholder="город" value="{{old('profession')}}">
                @error('profession')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group @error('experience') is-invalid @enderror" >
                <label>опыт *</label>
                <select name="experience">
                    <option>меньше, чем год</option>
                    <option>1 год</option>
                    <option>2 годa</option>
                    <option>3 годa</option>
                    <option>4 годa</option>
                    <option>5 лет</option>
                    <option>более 5 лет</option>
                    <option>более 10 лет</option>
                    <option>более 15 лет</option>
                    <option>более 20 лет</option>
                    <option>более 25 лет</option>
                </select>
                @error('experience')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>заглавие  *</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    placeholder="учитель английского" value="{{ old('title') }}">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Расскажите нам о своей школе *</label>
                <textarea class="form-control @error('about') is-invalid @enderror" name="about"
                    placeholder="О вашей школе">{{ $school->about }}</textarea>
                @error('about')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>описание работы *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    placeholder="описание работы">{{old('description')}}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="form-group">
                <label>требования *</label>
                <textarea class="form-control @error('requirements') is-invalid @enderror" name="requirements"
                    placeholder="описание работы">{{old('requirements')}}</textarea>
                @error('requirements')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>применение *</label>
                <textarea class="form-control @error('application') is-invalid @enderror" name="application"
                    placeholder="применение работы">{{ old('application')}}</textarea>
                @error('application')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>адрес *</label>
                <input type="text" name="address" id="search_form" class="form-control @error('address') is-invalid @enderror"
                    placeholder="адрес" value="{{old('address')}}">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>крайний срок *</label>
                <input type="date" name="deadline" class="form-control @error('deadline') is-invalid @enderror"
                    placeholder="deadline" value="{{old('deadline')}}">
                @error('deadline')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>зарплата</label>
                <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror"
                    placeholder="25,000 rub" value="{{old('salary')}}">
                @error('salary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
           

            <div class="invisible">
                <label>user_id</label>
                <input type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}"
                    placeholder="user_id">
            </div>
            <button type="submit" class="site-button">Отправить</button>
        </form>
    </div>
</div>
<!-- Submit Resume END -->

@endsection
