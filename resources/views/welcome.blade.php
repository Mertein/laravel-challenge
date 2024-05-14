<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Laravel </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<div class='container' style="height: 100%; width: max-content; display: flex; flex-direction: column; justify-content: center; align-items:center;">
    <h1 class='text-center' style='color:white;'>Table of Entities</h1>
    <div class="btn-group" style="display: flex; flex-direction: row; justify-content: space-evenly; gap: 32px; padding: 8px;" role="group" aria-label="Filtrar entidades">
        <a href="{{ url('/api') }}" class="btn btn-primary">All Entities</a>
        <a href="{{ url('/api/Animals') }}" class="btn btn-secondary">Animals</a>
        <a href="{{ url('/api/Security') }}" class="btn btn-secondary">Security</a>
    </div>

    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">App</th>
            <th scope="col">Link</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entities as $entity)
            <tr>
                <th scope="row">{{ $entity->id }}</th>
                <td>{{ $entity->api }}</td>
                <td>{{ $entity->link }}</td>
                <td>{{ $entity->description }}</td>
                <td>{{ $entity->category->category }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<style>
    body, html, :root {
        height: 100%;
        width: 100%;
    }

    body {
        background-color: rgb(47,79,79)
    }
</style>

