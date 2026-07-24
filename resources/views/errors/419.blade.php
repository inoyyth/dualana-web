@extends('errors.layout')

@section('title', __('Session Expired'))
@section('code', '419')
@section('icon')
    <i class="fa-solid fa-hourglass-half"></i>
@endsection
@section('icon-animation', 'float-animation')
@section('message', __('Your security token has expired due to inactivity. Please refresh the page and try again.'))
