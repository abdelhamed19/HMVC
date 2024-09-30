<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Table with Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <!-- Post Form -->
    <h2 class="mb-4">Add New Post</h2>
    <form action="{{route('blog.store')}}" method="POST" id="postForm">
        @csrf
        <div class="mb-3">
            <label for="postTitle" class="form-label">Post Title</label>
            <input type="text" class="form-control" id="postTitle" name="title" placeholder="Enter post title" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="content" placeholder="Enter content" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
