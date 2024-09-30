<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Table Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #logout {
            float: right;
            margin-right: 280px;
        }
    </style>
</head>

<body>
    <a href="{{ route('logout') }}" id="logout" class="btn btn-danger mb-3">Logout</a>
    <div class="container mt-5">
        <h2 class="mb-4">Posts Table</h2>

        <!-- Search Form -->
        @livewire('search')
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
