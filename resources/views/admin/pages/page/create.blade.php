@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Create a new page</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li>Create a new page</li>
        </ul>
    </div>
    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="wc-title d-flex">
                <h4>Create a new page</h4>
                <div class="ml-auto">
                    <a type="button" href="{{ route('school.profile') }}"
                        class="btn  ml-auto mr-2 text-white">Add</a>
                </div>
            </div>
            <div class="widget-inner">
                <form class="edit-profile m-b30" action="{{ route('pages.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="ml-auto">
                                <h3>Page Details</h3>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Name</label>
                            <div>
                                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Image</label>
                            <div>
                                <input class="form-control @error('image') is-invalid @enderror" name="image"
                                    type="file" value="{{ old('image') }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label class="col-form-label">Content</label>
                            <div>
                                <textarea class="summernote" name="content"
                                    type="text">{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="seperator"></div>
                        <div class="form-group">
                            <div class="">
                                <div class="row ">
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-7 d-flex">
                                        <button type="submit" class="btn">Save</button>
                                        <a href="{{ route('pages') }}"
                                            class="btn-secondry ml-3">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
