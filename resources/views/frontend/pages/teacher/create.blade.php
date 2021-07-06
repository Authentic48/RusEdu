@extends('frontend.layouts.app')

@section('content')
<!-- contact area -->

<!-- Submit Resume -->
<div class="section-full bg-white submit-resume content-inner-2">
    <div class="container">
        <form method="POST" action="{{ route('teacher.store') }}" enctype="multipart/form-data">
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
                <label>гражданство *</label>
                <input type="text" class="form-control @error('citizenship') is-invalid @enderror" name="citizenship"
                    value="{{ old('citizenship') }}" placeholder="Russian">
                @error('citizenship')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>город *</label>
                <input type="text" name="location"  class="form-control @error('location') is-invalid @enderror"
                    value="{{ old('location') }}" placeholder="City">
                @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>профессиональное звание *</label>
                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                    placeholder="english teacher" value="{{ old('subject') }}">
                @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group @error('experience') is-invalid @enderror">
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
                <label>Телефон *</label>
                <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    placeholder="Phone Number" value="{{ old('phone') }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Вы предлагаете онлайн-обучение? *</label>
                <select name="onlineTraining">
                    <option>да</option>
                    <option>нет</option>
                </select>
            </div>
            <div class="form-group">
                <label>Фото *</label>
                <div class="custom-file">
                    <input type="file" name="pic" class="site-button @error('pic') is-invalid @enderror"
                        id="customFile">
                    @error('pic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Минимальная заработная плата / ч *</label>
                <input type="text" name="wages" class="form-control @error('wages') is-invalid @enderror"
                    placeholder="700" value="{{ old('wages') }}">
                @error('wages')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Расскажите нам о себе *</label>
                <textarea class="form-control @error('about') is-invalid @enderror" name="about"
                    placeholder="Say something">{{ old('about') }} </textarea>
                @error('about')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>доступность *</label>
                <input type="text" name="work_day" class="form-control @error('working') is-invalid @enderror"
                    placeholder="Понедельник - Пятница" value="{{ old('work_day') }}">
                @error('work_day')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Рабочее время *</label>
                <div class="row">
                    <div class="col-md-3 mt-2">
                        <input type="text" name="from" class="form-control @error('from') is-invalid @enderror"
                            placeholder="9:00" value="{{ old('from') }}">
                        @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3 mt-2">
                        <input type="text" name="to" class="form-control @error('to') is-invalid @enderror"
                            placeholder="18:00" value="{{ old('to') }}">
                        @error('to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label>Skype</label>
                <input type="text" name="skype" class="form-control @error('skype') is-invalid @enderror"
                    placeholder="skype profile link" value="{{ old('skype') }} ">
                @error('skype')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Instagram</label>
                <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror"
                    placeholder="Instagram profile link" value="{{ old('instagram') }} ">
                @error('instagram')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Vk</label>
                <input type="text" name="vk" class="form-control @error('vk') is-invalid @enderror"
                    placeholder="instagram profile link" value="{{ old('vk') }} ">
                @error('vk')
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
            <button type="submit" class="site-button">Submit</button>
        </form>
    </div>
</div>
<!-- Submit Resume END -->
</div>
</div>
<!-- Content END-->
@endsection
