@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Schools</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li>Schools</li>
        </ul>
    </div>
    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="wc-title d-flex">
                <h4>Schools</h4>
                <div class="ml-auto">
                    <a type="button" href="{{ route('school.profile') }}"
                        class="btn  ml-auto mr-2 text-white">Add</a>
                </div>
            </div>
            <div class="widget-inner">
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                        <div class="new-user-list">
                            <ul>
                                @foreach ($schools as $school)
                                    <li>
                                    <span class="new-users-pic">
                                       <img src="{{ $school->pic ? $school->pic: url('https://img.icons8.com/officel/16/000000/user-male-skin-type-5.png') }}" alt="" />
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name">{{ $school->name }} </a>
                                        <span class="new-users-info">{{ $school->email }}</span>
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                         <!-- Pagination ==== -->
                 {{ $schools->links('frontend.partials.paginator') }}       
                 <!-- Pagination END ==== -->
                    </div>
                </div>
            </div>
    @endsection