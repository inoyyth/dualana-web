@extends('layouts.app')

@section('title', $title ?? 'Layered Architecture')

@section('content')

  @include('elements.error')

  @include('elements.hero')

  @include('elements.trust-band')

  @include('elements.about')

  @include('elements.services')

  @include('elements.scope')

  @include('elements.projects')

  @include('elements.testimonials')

  @include('elements.contact')

@endsection


