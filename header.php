<?php
session_start();

require_once 'conf.inc.php';

$bdd = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PWD);

require_once("classAuthentification.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Mini-Blog</title>
	<link rel="stylesheet" href=<?php echo CSS_PATH."style.css"; ?>>
	<link rel="stylesheet" href=<?php echo CSS_PATH."font-awesome.min.css"; ?>>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript">
tinymce.init({
        selector: "textarea",
        plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
        ],

        toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist charmap | undo redo | link unlink image code |  forecolor backcolor ",

        menubar: false,
        toolbar_items_size: 'small',

        style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
});</script>

</head>
<body>

<nav>
	<h1>Mini-blog</h1>
</nav>

<section class="container">
