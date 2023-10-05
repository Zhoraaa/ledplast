{{-- @section('title', 'Добавление статьи :: Мои статьи') 

@section('content')
<form action="{{ route('bb.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="txtTitle" class="form-label">Название</label>
        <input name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror>
    </div>
    <div class="mb-3">
        <label for="txtContent" class="form-label">Текст</label>
        <textarea name="content" id="txtContent" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}" row="3"></textarea>
        @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="txtPrice" class="form-label">Цена</label>
        <input name="price" id="txtPrice" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
        @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror>
    </div>
    <input type="submit" class="btn btn-primary" value="Добавить">
</form>
@endsection('content') --}}
