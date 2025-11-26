<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Detail Produk</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            margin: 0;
            padding: 30px;
            color: #111;
        }

        .container {
            max-width: 1080px;
            margin: auto;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background: #f1f1f1;
        }

        .details {
            padding: 40px;
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .desc {
            font-size: 14px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }

        .price {
            font-size: 24px;
            font-weight: 700;
            color: #0D6EFD;
            margin-bottom: 32px;
        }

        .btn-primary {
            display: inline-block;
            padding: 14px 22px;
            font-size: 15px;
            border-radius: 10px;
            font-weight: 600;
            background: black;
            color: white;
            text-decoration: none;
            letter-spacing: .3px;
            transition: .25s;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            opacity: .85;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
            text-decoration: none;
            transition: .25s;
        }

        .back-link:hover {
            color: #000;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .container {
                grid-template-columns: 1fr;
            }
            .product-img {
                height: 380px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    
    <!-- Image -->
    <img src="{{ $product->image  }}" 
         alt="{{ $product->name }}" class="product-img">

    <!-- Details -->
    <div class="details">
        <h1>{{ $product->name }}</h1>
        <p class="desc">{{ $product->description }}</p>
        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

        <a href="https://wa.me/62895359586490?text=Halo%2C%20saya%20ingin%20memesan%20{{ urlencode($product->name) }}%20dengan%20harga%20Rp%20{{ urlencode(number_format($product->price, 0, ',', '.')) }}"
   target="_blank"
   class="btn-primary">
   Pesan via WhatsApp
</a>

        <a href="{{ route('home') }}" class="back-link">← Kembali ke beranda</a>
    </div>

</div>

</body>
</html>
