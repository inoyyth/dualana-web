@extends('errors.layout')

@section('title', __('Internal Server Error'))
@section('code', '500')
@section('icon')
    <i class="fa-solid fa-microchip"></i>
@endsection
@section('icon-animation', 'pulse-animation')
@section('message', __('Our server encountered unexpected turbulence. We\'re on it—please try again shortly.'))
