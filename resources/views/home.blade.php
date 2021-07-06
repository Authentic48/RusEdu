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
         @if (Auth::user()->hasSchoolProfile(Auth::user()->id))
            <a class="site-button pull-right mb-5" href="{{ route('school.edit', $school->id) }}"> общедоступный профиль </a>
          @endif
          @if (Auth::user()->hasTeacherProfile(Auth::user()->id))
         <a class="site-button pull-right mb-5" href="{{ route('teacher.edit', $teacher->id) }}"> общедоступный профиль </a>
          @endif
       <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>имя *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', auth()->user()->name) }}" placeholder="Your Full Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Эл. адрес *</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email', auth()->user()->email) }}" placeholder="info@gmail.com">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
           
            <div class="form-group">
                <label>Аватар *</label>
                <div class="custom-file">
                    <input type="file" name="profile_image" class="site-button @error('profile_image') is-invalid @enderror"
                        id="customFile">
                    @error('profile_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                     @if (auth()->user()->profile_image)
                    <code>{{ auth()->user()->profile_image }}</code>
                    @endif
                     </div>
            </div>
            <button type="submit" class="site-button">обновить профиль</button>
    </form>       
    </div>         
     </div>
            
</div>
<!-- Submit Resume END -->

@endsection
