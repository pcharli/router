<!doctype html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Carnet</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
            <style>
                .qui {
                    margin-left: 1rem;
                    font-weight: bold;
                }
                dt {
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <div class="container content">
                <header class="hero is-primary">
                    <div class="hero-body">
                        <h1>Mon carnet</h1>
                    </div>
                    <nav class="nav">
                        <ul>
                            <li><a href="<?php echo ROOT;?>">Home</a></li>
                            <li><a href="<?php echo ROOT;?>contact">Contact</a></li>
                            <li><a href="<?php echo ROOT;?>secure">Secure</a></li>
                        </ul>
                    </nav>
                    <?php include("security.php");?>
                </header>