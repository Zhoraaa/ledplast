@extends('layouts.layout')

@section('title')
    Главная
@endsection

@php
    $forGrid = [
        '1' => 'Уличные светильники',
        'Промышленные светильники',
        'Офисные светильники',
        'Парковые опоры (светильники)',
        'Кронштейны и закладные',
        'Асуно, it-разработка ПО',
        'Светофорные комплексы',
        'Мобильное освещение',
        'Архитектурная подсветка',
    ];
@endphp

@section('body')
    <div class="cover">
        <div class="blur">
            <div class="logos text-light">
                <div class="fullogo">
                    <img src="{{ asset('imgs/fullogo.svg') }}" alt="">
                </div>
                <p>Мы дарим людям свет</p>
            </div>
        </div>
    </div>

    <div class="mini-catalogue">
        <h1 class="bblue-text text-center">
            Большой выбор товаров
        </h1>
        <div class="grid-ctlg">
            @foreach ($forGrid as $key => $item)
                <a href="">
                    <div class="category-card">
                        <div class="logo-ctg bg-bindigo">
                            <img src="{{ asset('imgs/logos/' . $key . '.svg') }}" alt="">
                        </div>
                        <div class="category-name bgray-text text-center">
                            {!! $item !!}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
