<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClassicModels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color: #F5E8B7;">
    
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #CD5C08;">
    <div class="container mb-4 mt-4">
        <a class="navbar-brand" href="/">Classic Models</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-4" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('product') ? 'active' : '' }}" href="/product">Products</a>
                </li>
            </ul>
            <form class="d-flex align-items-end" action="{{ route('products.search') }}" method="GET">
                <input class="form-control me-2" type="search" name="productLine" placeholder="Search by Product Line" aria-label="Search">
                <button class="btn btn-secondary" style="background-color: #F5E8B7; color: #000000" type="submit">Search</button>
            </form>            
        </div>
    </div>
</nav>
    <div class="container mt-4">
        @yield('container')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>