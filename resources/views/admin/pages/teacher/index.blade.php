@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Teachers Profile</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li>Teachers Profile</li>
        </ul>
    </div>

    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="wc-title d-flex">
                <h4>Teachers Profile</h4>
                <div class="ml-auto">
                    <a type="button" href="{{ route('teacher.profile') }}"
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
                                @foreach ($teachers as $teacher)
                                    <li>
                                    <span class="new-users-pic">
                                       <img src="{{ $teacher->pic ? $teacher->pic: url('https://img.icons8.com/officel/16/000000/user-male-skin-type-5.png') }}" alt="" />
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name">{{ $teacher->name }} </a>
                                        <span class="new-users-info">{{ $teacher->email }}</span>
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                         <!-- Pagination ==== -->
                 {{ $teachers->links('frontend.partials.paginator') }}       
                 <!-- Pagination END ==== -->
                    </div>
                </div>
            </div>
    @endsection