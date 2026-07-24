@extends('errors.layout')

@section('title', __('Access Forbidden'))
@section('code', '403')
@section('icon')
    <i class="fa-solid fa-shield-halved"></i>
@endsection
@section('icon-animation', 'pulse-animation')
@section('message', __('Halt! You do not have the required permissions to view this secure location.'))
