@extends('frontend.layouts.app')

@section('content')
    <div class="section-full bg-white submit-resume content-inner-2">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('application.store', $job->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label> имя заявителя *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', Auth::user()->name) }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                    <input type="text" class="invisible" name="teacher_id"
                        value="{{ old('teacher_id', Auth::user()->id) }}" placeholder="Beginner">
             
                <div class="form-group">
                    <label>Эл. адрес *</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email', Auth::user()->email) }}" placeholder="Дети">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                 <div class="form-group">
                    <label>название школы*</label>
                    <input type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name"
                        value="{{ old('school_name', $school->name ) }}" placeholder="Дети">
                    @error('school_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               <input type="text" class="invisible" name="status" value="в ожидании">
                    <input type="text" class="invisible" name="job_id"
                        value="{{ old('job_id', $job->id) }}" placeholder="4000">
                  <div class="form-group">
                    <label>Место работы *</label>
                    <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title"
                        value="{{ old('job_title', $job->title) }}" placeholder="Дети">
                    @error('job_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>   
                <div class="form-group">
                    <label>резюме *</label>
                    <div class="custom-file">
                        <input type="file" name="resume" class="site-button @error('resume') is-invalid @enderror"
                            id="customFile">
                        @error('resume')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
                <div class="invisible">
                    <input type="text" class="invisible" name="user_id" value="{{ $school->user_id }}"
                        placeholder="user_id">
                </div>
                <button type="submit" class="site-button">применять</button>
            </form>
        </div>
    </div>

</div>


@endsection