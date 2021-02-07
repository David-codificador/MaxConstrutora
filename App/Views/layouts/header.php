<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= TITLESITE ?> <?= $titulo ?></title>

        <!-- ========== COMMON STYLES ========== -->
        <link rel="stylesheet" href="<?= CSSTEMPLATE ?>bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="<?= CSSTEMPLATE ?>font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="<?= CSSTEMPLATE ?>animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="<?= CSSTEMPLATE ?>toastr/toastr.min.css" media="screen" >

        <!-- ========== THEME CSS ========== -->
        <link rel="stylesheet" href="<?= CSSTEMPLATE ?>main.css" media="screen" >

        <?= $css ?>
        <?= $arquivoCSS ?>

        <!-- ========== MODERNIZR ========== -->
        <script src="<?= JSTEMPLATE ?>modernizr/modernizr.min.js"></script>
    </head>

    <input type="hidden" id="link" value="<?=LINK?>" />
    <input type="hidden" id="recurso" value="<?=RECURSO?>" />
    
    
    