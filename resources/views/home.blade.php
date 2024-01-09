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
        <div class="blur centering">
            <div class="logos text-light">
                <div class="fullogo">
                    <img src="{{ asset('imgs/fullogo.svg') }}" alt="">
                </div>
                <p>Мы дарим людям свет</p>
            </div>
        </div>
    </div>

    <div class="divider"></div>

    {{-- Микро каталог --}}

    <div class="mini-catalogue">
        <h1 class="bblue-text text-center lt-up lt-bold">
            Большой выбор товаров
        </h1>
        <div class="grid-ctlg">
            @foreach ($forGrid as $key => $item)
                <a href="{{ route('shop', ['category' => $key]) }}">
                    @csrf
                    <div class="category-card">
                        <div class="logo-ctg bg-bindigo centering">
                            <img src="{{ asset('imgs/logos/' . $key . '.svg') }}" alt="">
                        </div>
                        <div class="category-name bgray-text text-center lt-up">
                            {!! $item !!}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="divider"></div>

    {{-- Услуги --}}

    <div class="big-block">
        <div class="info-wrapper">
            <div class="guy no-matter">
                <img src="imgs/services.png" alt="">
            </div>
            <div class="main-info-elem">
                <h1 class="bindigo-text lt-up lt-bold">
                    Уcлуги
                </h1>
                <span class="bgray-text">
                    Наша компания предоставляет широкий спектр услуг. Составление документации, проведение энергосервисных,
                    монтажных и геодезических работ. Ознакомиться с полным списком услуг вы можете на соответствующей
                    странице.
                </span>
                <div>
                    <a href="" class="rounded-btn text-light bg-bindigo lt-up">
                        К каталогу услуг →
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="divider"></div>
    {{-- Вакансии --}}
    <div class="big-block">
        <div class="centering info-wrapper">
            <div class="main-info-elem">
                <h1 class="bindigo-text lt-up lt-bold">
                    ВАКАНСИИ
                </h1>
                <span class="bgray-text">
                    Корпоративная связь, софинансирование абонементов в фитнес – клуб (Leo Fit), система накопления
                    персональных дней (1 день в год), отсутствие обязательного dress-code, книжный клуб (библиотека), ДМС
                    (подбор сети клиник, оптимального корпоративного тарифа) по согласованию, софинансирование авиа- и
                    ж/д-билетов в отпуск по РФ по согласованию.
                </span>
                <h1 class="bindigo-text lt-up lt-bold">
                    СЕЙЧАС ИЩЕМ:
                </h1>
                <div class="wewant">
                    <p>
                    <ul class="bgray-text lt-bold">
                        <li>asdsa</li>
                    </ul>
                    </p>
                </div>
            </div>
            <div class="guy no-matter">
                <img src="imgs/vacancies.png" alt="">
            </div>
        </div>
    </div>
@endsection
