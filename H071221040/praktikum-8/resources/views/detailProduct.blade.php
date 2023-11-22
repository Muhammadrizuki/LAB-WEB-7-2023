<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Product</title>
    <style>
        h1 {
            text-align: center;
        }
        body {
            background-color: rgb(195, 226, 202); 
        }
    </style>
</head>
<body>

    @if (count($data) == 0 )
        <p>Not found</p>
    @else
        <h1>Detail Product</h1>
        <p>Kode Produk : {{$read -> productCode}}</p>
        <p>Nama Produk : {{$read -> productName}}</p>
        <p>Jenis Produk: {{$read -> productLine}}</p>
        <p>Skala Produk : {{$read -> productScale}}</p>
        <p>Vendor Produk : {{$read -> productVendor}}</p>
        <p>Deskripsi Produk : {{$read -> productDescription}}</p>
        <p>Stok : {{$read -> quantityInStock}}</p>
        <p>Harga : {{$read -> buyPrice}}</p>
        <p>MSRP: {{$read -> MSRP}}</p>
    @endif
</body>
</html>