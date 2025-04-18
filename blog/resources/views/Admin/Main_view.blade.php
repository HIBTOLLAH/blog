@extends('layouts.Admin_app')

@section('title')
    Admin Panel
@endsection

@section('contect')
    <style>
        .section-title {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            border: 1px solid #007bff;
            border-radius: 10px;
            padding: 15px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 123, 255, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h5 {
            margin-bottom: 10px;
            color: #007bff;
        }

        .card p {
            margin: 0;
            color: #555;
        }
    </style>

    <div class="container mt-4">
        <h2 class="section-title">Welcome to the Admin Panel</h2>

        {{-- Users --}}
        <h3 class="section-title">Latest Users</h3>
        <div class="card-container">
            @foreach($users as $user)
                <div class="card">
                    <h5>{{ $user->name }}</h5>
                   
                </div>
            @endforeach
        </div>

        {{-- Posts --}}
        <h3 class="section-title">Latest Posts</h3>
        <div class="card-container">
            @foreach($posts as $post)
                <div class="card">
                    <h5>{{ $post->title }}</h5>

                </div>
            @endforeach
        </div>

        {{-- Comments --}}
        <h3 class="section-title">Latest Comments</h3>
        <div class="card-container">
            @foreach($comments as $comment)
                <div class="card">
                    <p>{{ \Str::limit($comment->content, 100) }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
