<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
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
    <h1>Product Data</h1>

    @foreach($data as $read)
        <p>==================================================</p>
        <p>Product Name: <a href="{{ route('readDetail', ['productCode' => $read->productCode]) }}">{{$read -> productName}}</a></p>
        <p>Product Type : {{$read -> productLine}}</p>
        <p>Product Vendor : {{$read -> productVendor}}</p>
        <p>Stock : {{$read -> quantityInStock}}</p>
    @endforeach
</body>
</html>