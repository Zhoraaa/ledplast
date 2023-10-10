@extends('layout')

@section('body')
    <main>
      <div class="container">
        <form class="w-50 my-0 mx-auto" action="{{ route('newArticle') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2 class="m-3">Создание статьи</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Название статьи</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                    <div class="alert alert-danger mt-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Содержание статьи</label>
                <textarea class="form-control" id="text" rows="2" name="text"></textarea>
                @error('text')
                    <div class="alert alert-danger mt-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="image" class="form-label">Изображение статьи</label>
                <input type="file" class="form-control" id="image" name="image">
            </div> --}}
                <br>
                <button type="submit" class="btn btn-primary">Создать статью</button>
            </div>
        </form>
    </div>
    </main>
@endsection