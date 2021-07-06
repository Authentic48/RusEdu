@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Users</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i>Tableau de board</a></li>
            <li>Users</li>
        </ul>
    </div>

    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="wc-title d-flex">
                <h4>Users</h4>
                <div class="ml-auto">
                    <a type="button" href="{{ route('users.create') }}"
                        class="btn  ml-auto mr-2 text-white">Ajouter</a>
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
                                @foreach ($users as $user)
                                    <li>
                                    <span class="new-users-pic">
                                       <img src="{{ $user->image ? $user->image: url('https://img.icons8.com/officel/16/000000/user-male-skin-type-5.png') }}" alt="" />
                                    </span>
                                    <span class="new-users-text">
                                        <a href="#" class="new-users-name">{{ $user->name }} </a>
                                        <span class="new-users-info">{{ $user->email }}</span>
                                    </span>
                                    <span class="new-users-btn d-flex">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn button-sm outline">Modifier</a>
                                        <form action="{{ route('users.delete',$user->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                      <button type="submit" class="btn button-sm outline ml-2">Supprimer</button>
                                    </form>
                                        
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
     
    @endsection