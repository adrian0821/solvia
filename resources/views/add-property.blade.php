<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Image to CSV</title>
    <link rel="icon" href="assets/favicon.svg" />
    <style>
        body { font-family: Arial, sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; background-color: #f4f4f4; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); text-align: center; }
        input, button { margin: 10px 0; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        button { background-color: #28a745; color: white; cursor: pointer; }
        button:hover { background-color: #218838; }
        table { width: 100%; margin-top: 20px; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .image-preview { width: 50px; height: 50px; object-fit: cover; }
    </style>
</head>
<body>
    <div class="container">
        <h2>CRUD Image & Description</h2>
        
        <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image[]" accept="image/*" multiple/>
            <input type="text" name="title" placeholder="Enter title">
            <input type="text" name="description" placeholder="Enter description">
            <input type="text" name="bedrooms" placeholder="Enter bedrooms">
            <input type="text" name="bathrooms" placeholder="Enter bathrooms">
            <input type="text" name="price" placeholder="Enter price">
            <input type="text" name="squar" placeholder="Enter squar">
            <button type="submit">Add Entry</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>title</th>
                    <th>Description</th>
                    <th>Bedrooms</th>
                    <th>Bathrooms</th>
                    <th>Price</th>
                    <th>Squar</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                    <tr>
                        <td>
                            @foreach($entry->image_path as $imagePath)
                                <img src="{{ asset($imagePath) }}" class="image-preview">
                            @endforeach
                        </td>
                        <td>
                            <input type="text" value="{{ $entry->title }}" 
                                onchange="updateEntry({{ $entry->id }}, this.value, 'title')">
                        </td>
                        <td>
                            <input type="text" value="{{ $entry->description }}" 
                                onchange="updateEntry({{ $entry->id }}, this.value, 'description')">
                        </td>
                        <td>
                            <input type="text" value="{{ $entry->bedrooms }}" 
                                onchange="updateEntry({{ $entry->id }}, this.value, 'bedrooms')">
                        </td>
                        <td>
                            <input type="text" value="{{ $entry->bathrooms }}" 
                                onchange="updateEntry({{ $entry->id }}, this.value, 'bathrooms')">
                        </td>
                        <td>
                            <input type="text" value="{{ $entry->price }}" 
                                onchange="updateEntry({{ $entry->id }}, this.value, 'price')">
                        </td>
                        <td>
                            <input type="text" value="{{ $entry->squar }}" 
                                onchange="updateEntry({{ $entry->id }}, this.value, 'squar')">
                        </td>
                        <td>
                            <button onclick="deleteEntry({{ $entry->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function updateEntry(id, value, key) {
            fetch(`/update/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ value, key })
            });
        }

        function deleteEntry(id) {
            fetch(`/delete/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            }).then(() => location.reload());
        }
    </script>
</body>
</html>
