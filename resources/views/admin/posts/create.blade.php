@vite(['resources/css/app.css', 'resources/js/app.js'])

<main>
    <form method="POST" action="{{ route('admin.posts.store') }}">

        @csrf

        <div class="mb-3">
            <label for="thumb" class="form-label">Url dell'immagine</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb"
                value="{{ old('thumb') }}">
            @error('thumb')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                name="title" value="{{ old('title') }}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="content" class="form-label">Post Content</label>
            <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>

</main>
