@extends('layouts.app')

@section('title', $title ?? 'REST API Demo')

@section('content')
    <div style="margin-bottom: 2rem;">
        <div style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); color: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
            <span style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; background: #38bdf8; color: #0f172a; padding: 0.25rem 0.75rem; border-radius: 9999px; font-weight: bold;">
                External Integration
            </span>
            <h1 style="font-size: 2.25rem; margin-top: 1rem; margin-bottom: 0.5rem; font-weight: 800; letter-spacing: -0.025em;">
                REST API Client Demo
            </h1>
            <p style="color: #94a3b8; font-size: 1.1rem; max-width: 600px; margin-bottom: 0;">
                This page consumes an external dummy API (<a href="https://jsonplaceholder.typicode.com" target="_blank" style="color: #38bdf8; text-decoration: none; font-weight: 600;">JSONPlaceholder</a>) by utilizing the newly created, custom HTTP client library.
            </p>
        </div>
    </div>

    @if ($error)
        <div style="background: #fef2f2; border-left: 4px solid #ef4444; color: #991b1b; padding: 1.25rem; border-radius: 8px; margin-bottom: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
            <strong style="display: block; font-size: 1.1rem; margin-bottom: 0.25rem;">Failed to fetch external posts</strong>
            <p style="margin: 0; font-size: 0.95rem; color: #b91c1c;">{{ $error }}</p>
        </div>
    @endif

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.5rem;">
        @forelse ($posts as $post)
            <div class="post-card" style="border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.5rem; background: #ffffff; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <span style="font-size: 0.75rem; font-weight: 700; color: #64748b; background: #f1f5f9; padding: 0.25rem 0.6rem; border-radius: 6px;">
                            ID: {{ $post['id'] }}
                        </span>
                        <span style="font-size: 0.75rem; font-weight: 600; color: #0284c7; background: #e0f2fe; padding: 0.25rem 0.6rem; border-radius: 6px;">
                            User: {{ $post['userId'] }}
                        </span>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 700; color: #0f172a; margin-top: 0; margin-bottom: 0.75rem; line-height: 1.4; text-transform: capitalize;">
                        <a href="{{ route('posts-detail', $post['id']) }}" style="color: inherit; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#2563eb'" onmouseout="this.style.color='inherit'">
                            {{ $post['title'] }}
                        </a>
                    </h3>
                    <p style="font-size: 0.95rem; color: #475569; line-height: 1.6; margin-bottom: 0;">
                        {{ $post['body'] }}
                    </p>
                </div>
                <div style="margin-top: 1.5rem; border-top: 1px solid #f1f5f9; padding-top: 1rem; display: flex; justify-content: flex-end;">
                    <a href="{{ route('posts-detail', $post['id']) }}" style="font-size: 0.85rem; font-weight: 600; color: #2563eb; text-decoration: none; display: inline-flex; align-items: center; gap: 0.25rem;">
                        Read Details →
                    </a>
                </div>
            </div>
        @empty
            @if (!$error)
                <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem; background: #fff; border: 1px dashed #cbd5e1; border-radius: 12px; color: #64748b;">
                    <p style="margin: 0; font-size: 1.1rem;">No posts found or retrieved.</p>
                </div>
            @endif
        @endforelse
    </div>

    <style>
        .post-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 20px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
            border-color: #cbd5e1 !important;
        }
    </style>
@endsection

@section('footer')
    Built dynamically using custom REST Client and clean architecture domain services.
@endsection
