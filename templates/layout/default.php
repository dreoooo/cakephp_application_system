<?php

/**
 * @var \App\View\AppView $this
 */

$cakeDescription = 'HTC Scholarship Portal';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->Html->charset() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?= $cakeDescription ?>
        |
        <?= $this->fetch('title') ?>
    </title>


    <?= $this->Html->meta('icon') ?>


    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Custom CSS -->

    <?= $this->Html->css('student') ?>

    <?= $this->Html->css('home') ?>


    <?= $this->fetch('css') ?>

    <?= $this->fetch('meta') ?>


</head>


<body>


    <?= $this->Flash->render() ?>


    <?= $this->fetch('content') ?>


    <?= $this->fetch('script') ?>


</body>


</html>