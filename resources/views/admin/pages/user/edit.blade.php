@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Modifier son profile</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i>Tableau de board</a></li>
            <li>Modifier son profile</li>
        </ul>
    </div>
    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="wc-title d-flex">
                <h4>Modifier son profile</h4>
                <div class="ml-auto">
                </div>
            </div>
            <div class="widget-inner">
                <div class="widget-inner">
                    <form class="edit-profile m-b30" action="{{ route('users.update', $user->id) }}"
                        method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="ml-auto">
                                    <h3>1. User Details</h3>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label class="col-form-label">Name</label>
                                <div>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                        type="text" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label class="col-form-label">Email</label>
                                <div>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                                        type="text" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label class="col-form-label">Confirmer Mot de Passe</label>
                                <div>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                                        type="text" value="{{ old('password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label class="col-form-label">Confirmer Mot de Passe</label>
                                <div>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password_confirmation"
                                        type="text" value="{{ old('password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label">Photo</label>
                                <div>
                                    <input class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" value="{{ old('profile_image') }}" type="file">
                                    @error('profile_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-6">
                            </div>

                            <div class="seperator"></div>

                            <div class="form-group">
                                <div class="">
                                    <div class="row ">
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-7 d-flex">
                                            <button type="submit" class="btn">Sauvegarder</button>
                                            <a href="{{ route('users') }}"
                                                class="btn-secondry ml-3">Annuler</a>
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