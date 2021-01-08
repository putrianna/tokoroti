<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Putri Bakery</title>
        <link rel="stylesheet" href="<?=base_url().'assets/css/style.css'?>">
        <style>
            button {
                background-color: palevioletred;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 50%;
            }
            button:hover {
                opacity: 0.8;
            }
            a{
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <h1>AWESOME BAKERY</h1>
        <h2>Freshly Baked, Happiness Guaranteed</h2>
        <button><a href="controller/login_view">login</a></button>
        <button><a href="controller/register_view">Register</a></button>
    </body>
</html>