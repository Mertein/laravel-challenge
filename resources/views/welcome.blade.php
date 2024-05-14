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
    <button class='btn btn-warning' id="insert-data-btn">Test Fetch Data and Insert to database</button>

    <div class="btn-group" style="display: flex; flex-direction: row; justify-content: space-evenly; gap: 32px; padding: 8px;" role="group" aria-label="Filtrar entidades">
        <a href="{{ url('/api') }}" target="_blank" class="btn btn-primary">All Entities</a>
        <a href="{{ url('/api/Animals') }}" target="_blank"  class="btn btn-secondary">Animals</a>
        <a href="{{ url('/api/Security') }}" target="_blank" class="btn btn-secondary">Security</a>
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
    {{ $entities->links() }}

    <!-- Footer -->
    <footer class="mt-5 text-center text-white">
        <p>Created with ♥ by Mertein</p>
    </footer>
</div>


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

<!-- Styles -->
<!-- Scripts -->
<script>
    document.getElementById('insert-data-btn').addEventListener('click', function() {
        fetch('{{ route("insert-data") }}', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload()
                alert(data.message);
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al realizar la solicitud');
        });
    });
</script>

