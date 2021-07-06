@extends('frontend.layouts.app')

@section('content')
<!-- contact area -->

<!-- Submit Resume -->
<div class="section-full bg-white submit-resume content-inner-2">
    <div class="container">
        <form method="post" action="{{ route('school.update', $school->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label>имя *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ $school->name }}" placeholder="имя">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Эл. адрес *</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $school->email }}" placeholder="info@gmail.com">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>город *</label>
                <input type="text" name="location"  class="form-control @error('location') is-invalid @enderror"
                 placeholder="City" value="{{ $school->location }}">
                @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>тип школы *</label>
                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                    placeholder="english teacher" value="{{ $school->subject }}">
                @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group @error('experience') is-invalid @enderror" >
                <label>опыт *</label>
                <select name="experience" value="{{ $school->experience }}">
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
                    placeholder="Phone Number" value="{{ $school->phone }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Вы предлагаете онлайн-обучение?  *</label>
                <select name="onlineTraining" >
                     <option>да</option>
                    <option>нет</option>
                </select>
            </div>
            <div class="form-group">
                <label>логотип *</label>
                <div class="custom-file">
                    <input type="file" name="pic" class="site-button @error('pic') is-invalid @enderror"
                        id="customFile">
                    @error('pic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      @if($school->pic )
                            <code>{{ $school->pic }}</code>
                     @endif
                </div>
            </div>

            <div class="form-group">
                <label>Средняя цена / месяц *</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                    placeholder="7000" value="{{ $school->price }}">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Расскажите нам о своей школе *</label>
                <textarea class="form-control @error('about') is-invalid @enderror" name="about"
                    placeholder="About your school">{{$school->about}}</textarea>
                @error('about')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Режим работи *</label>
               <input type="text" name="work_day" class="form-control @error('working') is-invalid @enderror"
                    placeholder="Monday - Friday" value="{{$school->work_day}}">
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
                    placeholder="9:00" value="{{$school->from}}">
                @error('from')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>
                    <div class="col-md-3 mt-2">
                        <input type="text" name="to" class="form-control @error('to') is-invalid @enderror"
                    placeholder="18:00" value="{{$school->to}}">
                @error('to')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>
                </div>
               
            </div>
            <div class="form-group">
                <label>адрес *</label>
                <input type="text" name="address" id="search_form" class="form-control @error('address') is-invalid @enderror"
                    placeholder="address" value="{{$school->address}}">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>веб-сайта</label>
                <input type="text" name="website" class="form-control @error('website') is-invalid @enderror"
                    placeholder="website profile link" value="{{$school->website}}">
                @error('website')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Skype</label>
                <input type="text" name="skype" class="form-control @error('skype') is-invalid @enderror"
                    placeholder="skype profile link" value="{{$school->skype}}">
                @error('skype')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Instagram</label>
                <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror"
                    placeholder="Instagram profile link" value="{{$school->instagram}}">
                @error('instagram')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Vk</label>
                <input type="text" name="vk" class="form-control @error('vk') is-invalid @enderror"
                    placeholder="instagram profile link" value="{{$school->vk}}">
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
@endsection
