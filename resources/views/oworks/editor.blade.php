@extends('layouts.layout')

@section('title')
    Редактор работ
@endsection

@section('body')
    <div class="divider"></div>
    <br>
    <br>

    <form action="" class="w60">
        @csrf
        <div class="form-group">
            <label for="owoName" class="lt-bold">Место проведения</label>
            <input type="text" class="form-control" id="owoName" aria-describedby="emailHelp"
                placeholder="Название региона">
            <small class="form-text text-muted">Введите название места, где был сдан проект.</small>
        </div>
        <div class="form-group">
            <label for="owoDesc" class="lt-bold">Место проведения</label>
            <textarea type="text" class="form-control tinyMCE" id="owoDesc" aria-describedby="emailHelp"
                placeholder="Краткое описание"></textarea>
            <small class="form-text text-muted">Краткое описание проекта.</small>
        </div>
        <div class="form-group">
            <label for="owoWeDo" class="lt-bold">Место проведения</label>
            <textarea type="text" class="form-control tinyMCE" id="owoWeDo" aria-describedby="emailHelp"
                placeholder="Что было выполнено?"></textarea>
            <small class="form-text text-muted">Какие работы были проведены?.</small>
        </div>
    </form>

    <br>
    <br>
    <div class="divider"></div>
@endsection
