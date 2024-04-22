<!-- resources/views/gallery.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Cats as a Service</title>
</head>
<body>
    <h1>Gallery - Cats as a Service</h1>

    <div>
        <form action="{{ route('cats.filter') }}" method="GET"> <!-- Cambiado a 'cats.filter' -->
            <label for="tags">Filter by Tag:</label>
            <input type="text" id="tags" name="tags">
            <button type="submit">Filter</button>
        </form>
    </div>

    <div style="display: flex; flex-wrap: wrap;">
        @foreach($cats as $cat)
            <div style="margin: 10px;">
                @if($cat['mimetype'] == 'image/jpeg' || $cat['mimetype'] == 'image/png')
                    <img src="https://cataas.com/cat/{{ $cat['_id'] }}" alt="Cat Image" style="width: 200px; height: auto;">
                @elseif($cat['mimetype'] == 'image/gif')
                    <img src="https://cataas.com/cat/{{ $cat['_id'] }}" alt="Cat GIF" style="width: 200px; height: auto;">
                @endif
                <p>Tags: {{ implode(', ', $cat['tags']) }}</p>
            </div>
        @endforeach
    </div>

    <div>
        <a href="{{ route('gallery') }}">Go to Gallery</a> <!-- Cambiado a 'gallery' -->
    </div>
</body>
</html>
