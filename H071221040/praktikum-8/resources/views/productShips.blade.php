<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ships</title>
    <style>
        h1 {
            text-align: center;
        }
        body {
            background-color: rgb(192, 228, 255); 
        }
    </style>
</head>
<body>
    <h1>Ship's Data</h1>

    @foreach($data as $read)
        <p>Product Name: <a href="{{ route('readDetail', ['productCode' => $read->productCode]) }}">{{$read -> productName}}</a></p>
    @endforeach
</body>
</html>