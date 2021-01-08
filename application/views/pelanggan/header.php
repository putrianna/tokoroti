<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            
        <meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="<?=base_url().'assets/css/style.css'?>">
    </head>
    <body>
        <div class="header">
            <h1>Awesome Bakery</h1>
            <h4 align="center">Freshly Baked, Happiness Guaranteed</h4>
            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url().'controller/pelanggan_page'?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=base_url().'controller/katalog'?>">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url().'controller/keranjang_view'?>">Keranjang Belanja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url().'controller/logout'?>">Log Out</a>
                    </li>
                </ul>
            </nav>
        </div>