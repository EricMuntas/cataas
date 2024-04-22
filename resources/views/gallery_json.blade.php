<!-- resources/views/gallery_json.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Cats as a Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 8px;
            font-size: 16px;
        }

        button {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 0 auto;
            max-width: 1000px;
        }

        .gallery-item {
            margin: 10px;
            text-align: center;
        }

        .gallery-item img {
            width: 200px;
            height: auto;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        }

        .gallery-item p {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>Gallery - Cats as a Service</h1>

    <div>
        <form action="{{ route('gallery') }}" method="GET">
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
            <p>Tags: {{ is_array($cat['tags']) ? implode(', ', $cat['tags']) : $cat['tags'] }}</p>
        </div>
    @endforeach
</div>
</body>
</html>
