@extends('layouts.app')

@section('title', $title)

@section('content')
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('posts-demo') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; color: #475569; font-weight: 600; font-size: 0.95rem; transition: color 0.2s;" onmouseover="this.style.color='#0f172a'" onmouseout="this.style.color='#475569'">
            ← Back to Posts List
        </a>
    </div>

    @if ($error)
        <div style="background: #fef2f2; border-left: 4px solid #ef4444; color: #991b1b; padding: 1.25rem; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
            <strong style="display: block; font-size: 1.1rem; margin-bottom: 0.25rem;">Failed to fetch post details</strong>
            <p style="margin: 0; font-size: 0.95rem; color: #b91c1c;">{{ $error }}</p>
        </div>
    @elseif (empty($post))
        <div style="background: #fff; border: 1px dashed #cbd5e1; padding: 4rem 2rem; border-radius: 12px; text-align: center; color: #64748b;">
            <p style="margin: 0; font-size: 1.1rem;">Post details could not be found.</p>
        </div>
    @else
        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 2.5rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02); max-width: 800px; margin: 0 auto;">
            <div style="display: flex; gap: 1rem; align-items: center; margin-bottom: 1.5rem;">
                <span style="font-size: 0.85rem; font-weight: 700; color: #0284c7; background: #e0f2fe; padding: 0.35rem 0.8rem; border-radius: 8px;">
                    Post ID: {{ $post['id'] }}
                </span>
                <span style="font-size: 0.85rem; font-weight: 700; color: #475569; background: #f1f5f9; padding: 0.35rem 0.8rem; border-radius: 8px;">
                    Author User: {{ $post['userId'] }}
                </span>
            </div>

            <h1 style="font-size: 2.25rem; font-weight: 800; color: #0f172a; margin-top: 0; margin-bottom: 1.5rem; line-height: 1.35; text-transform: capitalize; letter-spacing: -0.025em;">
                {{ $post['title'] }}
            </h1>

            <div style="font-size: 1.15rem; color: #334155; line-height: 1.8; margin-bottom: 2rem; border-left: 4px solid #cbd5e1; padding-left: 1.5rem; font-style: italic;">
                {{ $post['body'] }}
            </div>

            <div style="border-top: 1px solid #e2e8f0; padding-top: 1.5rem; display: flex; justify-content: space-between; align-items: center;">
                <span style="font-size: 0.85rem; color: #64748b;">Data source: JSONPlaceholder API</span>
                <a href="https://jsonplaceholder.typicode.com/posts/{{ $post['id'] }}" target="_blank" style="font-size: 0.9rem; font-weight: 600; color: #2563eb; text-decoration: none;">
                    View Raw API Output →
                </a>
            </div>
        </div>
    @endif
@endsection

@section('footer')
    Detailed page retrieved via custom REST Client library.
@endsection
