@extends('layouts.layout')

@section('title')
    Уральский светотехнический заавод
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
    $ourWorks = $data['oworks'];
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

    {{-- Наши работы --}}

    @auth
        @if (auth()->user()->role < 3)
            <div class="divider"></div>
            <br>
            <div class="d-flex flex-wrap centering">
                <form action="{{ @route('OWnew') }}" method="post">
                    @csrf
                    <button class="btn btn-primary m-2">Добавить проект</button>
                </form>
            </div>
            <br>
        @endif
    @endauth

    <div class="divider"></div>

    <div class="d-flex flex-wrap flex-column align-items-center w60">
        @foreach ($ourWorks as $ourWork)
            @php
                $link = $ourWork->cover === 'default.png' ? 'imgs/default.png' : 'storage/imgs/our_works/covers/' . $ourWork->cover;
            @endphp
            <div class="d-flex flex-wrap align-items-start w-100">
                <div class="OWcover d-flex flex-wrap align-items-start">
                    <img src="{{ asset($link) }}" alt="">
                </div>
                <div class="p-3 d-flex flex-wrap flex-column">
                    <h3 class="bgray-text lt-bold lt-up">
                        {{ $ourWork->name }}
                    </h3>
                    <div class="bgray-text lt-thin">
                        {{ $ourWork->year }}
                    </div>
                    <br>
                    <div class="bgray-text">
                        {!! strlen($ourWork->description) < 200 ? $ourWork->description : substr($ourWork->description, 0, 150) . '...' !!}
                    </div>
                    <br>
                    <a href="{{ route('OWview', ['id' => $ourWork->id]) }}"><button class="btn btn-primary">Подробнее
                            →</button></a>
                </div>
            </div>
        @endforeach
    </div>

    @auth
        @if (auth()->user()->role < 3)
            <div class="divider"></div>
            <br>
            <div class="d-flex flex-wrap centering">
                <form action="{{ @route('letterNew') }}" method="post">
                    @csrf
                    <button class="btn btn-primary m-2">Добавить письмо</button>
                </form>
            </div>
            <br>
        @endif
    @endauth


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
                <ul class="bgray-text lt-bold wewant">
                    <li>Монатжника</li>
                    <li>Высотника</li>
                    <li>Сотника</li>
                    <li>Прапорщика</li>
                </ul>
            </div>
            <div class="guy no-matter">
                <img src="imgs/vacancies.png" alt="">
            </div>
        </div>
    </div>
@endsection
