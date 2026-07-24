@extends('errors.layout')

@section('title', __('Page Not Found'))
@section('code', '404')
@section('icon')
    <i class="fa-solid fa-compass"></i>
@endsection
@section('icon-animation', 'spin-animation')
@section('message', __('Oops! The page you are looking for has drifted off into space or was never created.'))
