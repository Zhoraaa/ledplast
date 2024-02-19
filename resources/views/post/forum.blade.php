@extends('layouts.layout')

@php
    $title = $data['title'];
    $posts = $data['posts'];
@endphp

@section('title')
    {{ $title }}
@endsection

@section('body')
    <div class="divider"></div>

    <div class="widthing centering pagination">
        {{ $posts->links() }}
    </div>

    <div class="widthing">
        @auth
            @if (auth()->user()->role < 3)
                <form action="{{ @route('postNew') }}" method="post">
                    @csrf
                    <button class="btn btn-primary m-2">Новая статья</button>
                </form>
            @endif
        @endauth
        @if (!empty($posts))
            @foreach ($posts as $post)
                <hr>
                <div class="rounded p-4">
                    <a href="{{ route('seePost', ['id' => $post->id]) }}">
                        <h2>
                            {{ $post->theme }}
                        </h2>
                    </a>
                    <p>{!! mb_strlen($post->text) < 400 ? $post->text : mb_substr($post->text, 0, 200) . '...' !!}</p>
                    <a href="{{ route('seePost', ['id' => $post->id]) }}"><button class="btn btn-primary">Подробнее
                            →</button></a>
                </div>
            @endforeach
        @else
            статьяов пока нет
        @endif
    </div>

    <div class="widthing centering pagination">
        {{ $posts->links() }}
    </div>
    <div class="divider"></div>
@endsection
