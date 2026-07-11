@extends('layouts.app')

@section('title', $title ?? 'Layered Architecture')

@section('content')
    <h1>Layered Architecture</h1>
    <p>This demo shows the four layers of a Laravel application in a simple, maintainable structure.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem;">
        @foreach ($overview as $layer)
            <div style="border: 1px solid #ddd; border-radius: 8px; padding: 1rem; background: #fff;">
                <h2 style="margin-bottom: 0.5rem;">{{ $layer['name'] }}</h2>
                <p>{{ $layer['description'] }}</p>
                <ul style="padding-left: 1.2rem;">
                    @foreach ($layer['responsibilities'] as $responsibility)
                        <li>{{ $responsibility }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endsection

@section('footer')
    Built with Laravel Blade layout inheritance.
@endsection
