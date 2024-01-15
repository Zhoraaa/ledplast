@extends('layouts.layout')

@section('title')
    {{ $product->name }}
@endsection

@php
    $link = $product->ProductMedia()->count() === 0 ? 'imgs/default.png' : 'storage/imgs/products/' . $product->cover;
@endphp

@section('body')
    <div class="divider"></div>

    @auth
        @if (auth()->user()->role < 2)
            <br>
            <div class="d-flex centering">
                <form action="{{ @route('productEdit', ['id' => $product->id]) }}" method="post">
                    @csrf
                    <button class="btn btn-secondary m-2">Редактировать товар</button>
                </form>
                <form action="{{ @route('productDelete', ['id' => $product->id]) }}" method="post">
                    @csrf
                    <button class="btn btn-danger m-2">Удалить товар</button>
                </form>
            </div>

            <br>

            <div class="divider"></div>
        @endif
    @endauth
    <br>
    <br>

    <div class="w80">
        <div class="d-flex about-product flex-wrap centering">
            <div class="product-cover m-2">
                <img src="{{ asset($link) }}" alt="Изображение продукта">
            </div>
            <div class="d-flex flex-column m-2">
                <h1 class="lt-bold lt-up bindigo-text m-2">{{ $product->name }}</h1>
                <span class="m-2">{!! $product->description !!}</span>
                <h4 class="m-2">{{ $product->cost }}₽</h4>
                @auth
                    <form action="{{ @route('addToCart', ['id' => $product->id]) }}" method="post">
                        @csrf
                        <button class="btn btn-primary m-2">Добавить в корзину</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>

    <br>
    <br>
    <div class="divider"></div>
    <br>
    <br>

    <div class="w80 d-flex centering flex-row-reverse justify-content-between">
        <div class="plank-info">
            <div>
                <span class="lt-bold">sdas</span>
                <span class="lt-up"></span>
            </div>
        </div>
        <div class="text-info">
            <br>
            <br>
            <div>
                <h1 class="lt-bold lt-up bindigo-text m-2">Преимущества:</h1>
            </div>
            <br>
            <div>
                <h1 class="lt-bold lt-up bindigo-text m-2">Применение:</h1>
            </div>
        </div>
        <br>
        <br>
    </div>
@endsection
