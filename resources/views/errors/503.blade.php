@extends('errors.layout')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('icon')
    <i class="fa-solid fa-screwdriver-wrench"></i>
@endsection
@section('icon-animation', 'float-animation')
@section('message', __('We are currently conducting scheduled upgrades to make things better. We\'ll be back online in a moment!'))
