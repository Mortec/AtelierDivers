
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script> -->
    <link href="<?= url('/assets/css/reset.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Orbitron:400,700&display=swap" rel="stylesheet"> 
    <link href="<?= url('/assets/css/style.css') ?>" rel="stylesheet">

    <title>O'QUIZ</title>

</head>

<body>
    <!-- particles.js container -->
    

    <div class="container"><div id="particles-js"></div>

        <header class="header ">

            <nav class="header__nav">
                <ul class="header__ul">
                    <a class="header__link" href="<?= route('home') ?>">
                        <li class="header__li"> Accueil</li>
                    </a>
                    <a class="header__link" href="<?= route('account') ?>">
                        <li class="header__li"> Compte</li>
                    </a>
                    <a class="header__link" href="<?= route('home') ?>">
                        <li class="header__li logo">O'Quiz</li>
                    </a>
                    <a class="header__link" href="<?= route('sign') ?>">
                        <li class="header__li">Connexion </li>
                    </a>
                    <a class="header__link" href="<?= route('logout') ?>">
                        <li class="header__li">Déconnexion </li>
                    </a>
                </ul>
            </nav>

        </header>