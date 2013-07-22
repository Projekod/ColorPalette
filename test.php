<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Color Palette Test</title>

    <style>
        body {
            margin: 0px;padding:0px;
        }
        .box {
            width: 25%;
            height: 200px;
            float: left;
            margin:0px;
            padding:0px;
            text-align: center;

        }
        .image {
            margin:10px;
            text-align: center;

        }
    </style>
</head>
<body>

<div class='image'>
    <img src='test.jpg' alt='color palette test image' />
</div>

<?php
require "pk_color.php";

$pkc = new pk_color();
$palette = $pkc->setGranularity(10)
    ->setPicture("test.jpg")
    ->setColorsCount(30)
    ->getIt();


?>

<?php
    foreach($palette as $color):
?>
    <div class='box' style="background:#<?=$color?> ">#<?=$color?></div>
<?php
    endforeach;
?>
</body>
</html>