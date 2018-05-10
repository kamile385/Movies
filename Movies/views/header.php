<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>        
        <title>Cinema</title>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css"/>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/sunny/jquery-ui.css" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>

        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
            }
        }
        ?>

    </head>
    <body>
        <?php Session::init(); ?>

        <nav>

            <div class="toggle">
                <i class="fa fa-bars menu" aria-hidden="true"></i>
            </div>
            <ul>
                <?php if (Session::get('loggedIn') == false): ?>
                    <li><a href="<?php echo URL; ?>index" class="active">Index</a></li>
                    <li><a href="<?php echo URL; ?>about">About</a></li>
                <?php endif; ?>	        
                <?php if (Session::get('loggedIn') == true): ?>
                    <li><a href="<?php echo URL; ?>dashboard/logout">Logout</a></li>
                    <p class="username">Username:  <?php echo $_SESSION['usr_name']; ?></p>
                <?php else: ?>
                    <li><a href="<?php echo URL; ?>login">Login</a></li>
                <?php endif; ?>
                <li><a href="<?php echo URL; ?>register">Register</a></li>
            </ul>
        </nav>
