@extends('layout')

@section('title')
    Single-news
@endsection


@section('body')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Read the Details</p>
                        <h1>Single Article</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- single article section -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- كارد المقال -->
                <div class="card shadow-sm">
                    <img src="{{ asset('uploads/' . $news->image) }}" class="card-img-top img-fluid" alt="{{ $news->title() }}">
                    <div class="card-body">
                        <h2 class="card-title">{{ $news->title() }}</h2>
                        <p class="text-muted">
                            <i class="fas fa-user me-1"></i> {{ $news->author }} |
                            <i class="fas fa-calendar-alt me-1"></i> {{ $news->formatted_date }}
                        </p>
                        <p class="card-text">{{ $news->content() }}</p>
                    </div>
                </div>

                <!-- قسم التعليقات -->
                <div class="mt-4">
                    <h3 class="mb-3"><i class="fas fa-comments"></i> {{ $news->comments->count() }} Comments</h3>
                    <div class="list-group">
                        @foreach ($news->comments as $comment)
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $comment->name() }}</h5>
                                    <small class="text-muted">{{ $comment->created_at->format('d M, Y') }}</small>
                                </div>
                                <p class="mb-1">{{ $comment->comment() }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
