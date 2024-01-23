@extends('layouts.layout')

@section('title')
    Наши работы
@endsection

@section('body')
    <div class="divider"></div>
    <br>
    <br>

    <div class="w80">
        <h1 class="bindigo-text lt-bold lt-up">
            Наши работы
        </h1>

        <br>
        <br>

        <div class="d-flex flex-column align-items-center">
            @foreach ($ourWorks as $ourWork)
                @php
                    $link = ($ourWork->cover === 'default.png') ? 'imgs/default.png' : 'storage/imgs/our_works/covers/'.$ourWork->cover;
                @endphp
                <div class="d-flex align-items-start w-100">
                    <div class="OWcover d-flex align-items-start">
                        <img src="{{ asset($link) }}" alt="">
                    </div>
                    <div class="p-3 d-flex flex-column">
                        <h3 class="bgray-text lt-bold lt-up">
                            {{ $ourWork->name }}
                        </h3>
                        <div class="bgray-text lt-thin">
                            {{ $ourWork->year }}
                        </div>
                        <br>
                        <div class="bgray-text">
                            {!! strlen($ourWork->description) < 200 ? $ourWork->description : substr($ourWork->description, 0, 150).'...' !!}
                        </div>
                        <br>
                        <a href="{{ route('OWview', ['id' => $ourWork->id]) }}"><button class="btn btn-primary">Подробнее →</button></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <br>
    <br>
    <div class="divider"></div>
@endsection
