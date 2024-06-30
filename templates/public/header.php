<?php
$url_redirect = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  
?>
<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $title; ?></title>
    <!-- Primary Meta Tags -->
    <meta name="title" content="<?php echo $title; ?>">
    <meta name="description" content="<?php echo $description; ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $url_redirect; ?>">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $description; ?>">
    <meta property="og:image" content="<?php echo $url_redirect; ?>assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $url_redirect; ?>">
    <meta property="twitter:title" content="<?php echo $title; ?>">
    <meta property="twitter:description" content="<?php echo $description; ?>">
    <meta property="twitter:image" content="<?php echo $url_redirect; ?>assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700">
    <link rel="stylesheet" href="./dist/css/vendor.min.css">
    <link rel="stylesheet" href="./plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="./plugins/noty/noty.min.css">
    <link rel="stylesheet" href="./dist/css/style.min.css">
  </head>
  <body>