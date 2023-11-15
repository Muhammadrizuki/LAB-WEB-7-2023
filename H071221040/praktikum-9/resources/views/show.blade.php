<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>


    <div class="container">
        <h1>Detail Produk</h1>
        
        <table class="table table-bordered">
            <tr>
                <th style="border: 1px solid #ddd;">Nama</th>
                <td style="border: 1px solid #ddd;">{{ $coffeeProduct->name }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">Deskripsi</th>
                <td style="border: 1px solid #ddd;">{{ $coffeeProduct->description }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">Merek</th>
                <td style="border: 1px solid #ddd;">{{ $coffeeProduct->brand }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">Harga</th>
                <td style="border: 1px solid #ddd;">{{ $coffeeProduct->price }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd;">Stok</th>
                <td style="border: 1px solid #ddd;">{{ $coffeeProduct->stock }}</td>
            </tr>
        </table>

        <a href="{{ route('coffee-products.index') }}" class="btn btn-primary" style="background-color: #7c8378; border-color: #7c8378;">Kembali ke Daftar Produk</a>
    </div>

