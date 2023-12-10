<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Product</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    @php
    $number = 1;
    @endphp
    <div class="container">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown link
            </a>

            <ul class="dropdown-menu">
            @foreach ($productLine as $list)
                <li><a class="dropdown-item" href="{{route('search',['productLine'=>$list->productLine])}}">{{$list->productLine}}</a></li>
                @endforeach
            </ul>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Line</th>
                    <th scope="col">Product Vendor</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $produk)
                <tr>
                    <th scope="row">{{$number}}</th>
                    <td><a href="{{route('detail',['productCode'=>$produk->productCode])}}">{{$produk->productName}}</a></td>
                    <td>{{$produk->productLine}}</td>
                    <td>{{$produk->productVendor}}</td>
                    <td>{{$produk->quantityInStock}}</td>
                </tr>
                @php
                $number++;
                @endphp

                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>