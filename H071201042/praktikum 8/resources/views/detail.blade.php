<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product[0]->productName }} | Product</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Line</th>
                    <th scope="col">Product Scale</th>
                    <th scope="col">Product Vendor</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">MSRP</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $produk)
                <tr>
                    <th scope="row">{{$produk->productCode}}</th>
                    <td>{{$produk->productName}}</td>
                    <td>{{$produk->productLine}}</td>
                    <td>{{$produk->productScale}}</td>
                    <td>{{$produk->productVendor}}</td>
                    <td>{{$produk->productDescription}}</td>
                    <td>{{$produk->quantityInStock}}</td>
                    <td>{{$produk->buyPrice}}</td>
                    <td>{{$produk->MSRP}}</td>
                </tr>


                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>