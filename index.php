<?php if ($_GET['language'] == 'PT-BR') {
    $url = "https://translate.google.com.br/translate_tts?ie=UTF-8&client=gtx&tl=pt-IN&q=";
} elseif ($_GET['language'] == 'EN') {
    $url = "https://translate.google.com.br/translate_tts?ie=UTF-8&client=gtx&tl=en-IN&q=";
} else {
    $url = "https://translate.google.com.br/translate_tts?ie=UTF-8&client=gtx&tl=pt-IN&q=";
} ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preload" href="assets/fonts/brice-regularsemiexpanded-webfont.woff">
    <link rel="preload" href="assets/fonts/brice-regularsemiexpanded-webfont.woff2">
    <title>PHP Speak</title>
</head>

<body>
    <header>
        <div class="d-flex m-3">
            <a href="https://github.com/JuanCalavera" target="_blank" rel="noopener noreferrer" class="mr-3"><i class="fab fa-github"></i>/JuanCalavera</a>
            <a href="https://www.linkedin.com/in/juan-jurado-b87036141/" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin"></i> /juan-jurado-b87036141</a>
        </div>

        </div>
    </header>
    <div class="container">
        <h1 class="mt-5 text-center">PHP SPEAK <i class="fas fa-microphone-alt"></i></h1>
        <h2 class="text-primary text-center" id="div1" style="display: none;"><?= $_GET['language'] == "EN" ? "Make php talk using google translate api" : "Coloque o php falar usando a api do google translate" ?></h2>
        <hr id="div2" style="display: none;">
        <div class="d-flex justify-content-center" id="div3" style="display: none;">
            <form method="get">
                <input type="hidden" name="language" value="PT-BR">
                <button type="submit" class="btn btn-outline-secondary btn-lg mr-4">PT-BR</button>
            </form>
            <form method="get">
                <input type="hidden" name="language" value="EN">
                <button type="submit" class="btn btn-outline-secondary btn-lg">EN</button>
            </form>
        </div>
        <div id="div4" style="display: none;">
            <?php
            $txt = $_POST['text'];
            $txt = htmlspecialchars($txt);
            $txt = rawurlencode($txt);
            $url = $url . $txt;
            $html = file_get_contents($url);
            if ($txt) { ?>
                <h4>Aperte <i class="fas fa-play"></i> para ouvir</h4>
                <audio autoplay controls="controls">
                    <source src="data:audio/mpeg;base64,<?= base64_encode($html) ?>">
                </audio>
            <?php } ?>

            <form method="post">
                <div class="form-group">
                    <label for="text"><?= $_GET['language'] == 'EN' ? "Place the text for the system to speak" : "Coloque o texto para o sistema falar" ?> <i class="fas fa-volume-up"></i></label>
                    <textarea name="text" class="form-control area" id="text" cols="30" rows="10"></textarea>
                    <button id="div5" style="display: none;" type="submit" class="btn btn-secondary btn-lg mt-3"><i class="fas fa-microphone"></i> <?= $_GET['language'] == 'EN' ? "SPEAK" : "FALAR" ?></button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <div id="div6" style="display: none;">
            <h4 class="text-secondary text-center"><?= $_GET['language'] == "EN" ? "Created by Juan Solferini Jurado" : "Criado por Juan Solferini Jurado" ?></h4>
            <div class="d-flex justify-content-center">
                <a href="https://github.com/JuanCalavera" target="_blank" rel="noopener noreferrer" class="mr-3"><i class="fab fa-github"></i>/JuanCalavera</a>
                <a href="https://www.linkedin.com/in/juan-jurado-b87036141/" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin"></i> /juan-jurado-b87036141</a>
            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/all.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#div1').fadeIn("slow");
                $('#div2').fadeIn(1000);
                $('#div3').fadeIn(1500);
                $('#div4').fadeIn(2000);
                $('#div5').fadeIn(2500);
                $('#div6').fadeIn(3000);
            });
        </script>
    </footer>
</body>

</html>