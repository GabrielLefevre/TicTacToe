<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 19/10/2016
 * Time: 14:02
 */
require_once('assets/TicTacToe.php');

session_start();

if (!isset($_SESSION['tictactoe']))
    $_SESSION['tictactoe'] = new tictactoe();
?>

<html>
    <head>
        <title>Tic Tac Toe</title>
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
    </head>
    <body>
    <h2> TIC TAC TOE</h2>
    <h3>2 joueurs</h3>
        <div id="content">
            <form method="POST">
                <?php
                $_SESSION['tictactoe']->action($_POST);
                ?>
            </form>
        </div>
    </body>
</html>
