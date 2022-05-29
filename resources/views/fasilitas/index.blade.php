@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        @if (Session::has('alert'))
            <div class="alert alert-{{ Session::get('alert') }}" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="text-center mb-4">
            <h2 style="color: #170F49;"><b>{{ $title }}</b></h2>
        </div>
        