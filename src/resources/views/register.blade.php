@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/resister.css') }}" />
@endsection
@section('auth_button')
<a href="{{ route('login') }}" class="btn btn-primary">login</a>
@endsection

@section('content')
<div class="todo__alert">
    @if (session('message'))
    <div class="todo__alert--success">{{ session('message') }}</div>
    @endif @if ($errors->any())
    <div class="todo__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>