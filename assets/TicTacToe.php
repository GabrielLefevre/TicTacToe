<?php

/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 19/10/2016
 * Time: 14:02
 */
class TicTacToe
{
    protected $joueur;
    protected $board;
    protected $fin;

    function __construct() {
        $this->joueur="X";
        $this->newBoard();
        $this->fin=false;
    }

    function newBoard() {
        $this->board = array();
        for($i=0;$i<3;$i++) {
            for($j=0;$j<3;$j++) {
                $this->board[$i][$j] = null;
            }
        }
    }

    function action($x) {
        if (!$this->fin && isset($x['action'])) {
            $this->jouer($x);
        }
        if (isset($x['newgame'])) {
            session_destroy();
        }
        $this->affichage();
    }

    function affichage() {
        if (!$this->fin) {
            echo "<div id=\"board\">";
            for ($i = 0; $i < 3; $i++) {
                for ($j = 0; $j < 3; $j++) {
                    echo "<div class=\"board_cell\">";
                    if ($this->board[$i][$j])
                        echo "<img src=\"img/{$this->board[$i][$j]}.jpg\" alt=\"{$this->board[$i][$j]}\" title=\"{$this->board[$i][$j]}\" />";
                    else {
                        echo "<input name=\"{$i}_{$j}\" type=\"checkbox\" value=\"{$this->joueur}\">";
                    }
                    echo "</div>";
                }
                echo "<div class=\"break\"></div>";
            }
            echo "<p align=\"center\"><input type=\"submit\" name=\"action\" value=\"Jouer\" /><br/><b>C'est au tour du joueur {$this->joueur}.</b> <br/>
					<input type=\"submit\" name=\"newgame\" value=\"Nouvelle partie\" /></p></div>";
        }
        else {
           echo "Fin de la partie !";
            session_destroy();
            echo "<p align=\"center\"><input type=\"submit\" name=\"newgame\" value=\"Nouvelle partie\" /></p>";
        }
    }

    function jouer($x) {
        $this->fin();
        $x = array_unique($x);
        foreach ($x as $key => $value) {
            if ($value == $this->joueur) {
                $coords = explode("_", $key);
                $this->board[$coords[0]][$coords[1]] = $this->joueur;
                if ($this->joueur == "X")
                    $this->joueur = "O";
                else
                    $this->joueur = "X";
            }
        }
        $this->fin();
    }

    function fin() {
        if ($this->board[0][0] && $this->board[0][0] == $this->board[0][1] && $this->board[0][1] == $this->board[0][2])
            $this->fin = true;
        if ($this->board[1][0] && $this->board[1][0] == $this->board[1][1] && $this->board[1][1] == $this->board[1][2])
            $this->fin = true;
        if ($this->board[2][0] && $this->board[2][0] == $this->board[2][1] && $this->board[2][1] == $this->board[2][2])
            $this->fin = true;
        if ($this->board[0][0] && $this->board[0][0] == $this->board[1][0] && $this->board[1][0] == $this->board[2][0])
            $this->fin = true;
        if ($this->board[0][1] && $this->board[0][1] == $this->board[1][1] && $this->board[1][1] == $this->board[2][1])
            $this->fin = true;
        if ($this->board[0][2] && $this->board[0][2] == $this->board[1][2] && $this->board[1][2] == $this->board[2][2])
            $this->fin = true;
        if ($this->board[0][0] && $this->board[0][0] == $this->board[1][1] && $this->board[1][1] == $this->board[2][2])
            $this->fin = true;
        if ($this->board[0][2] && $this->board[0][2] == $this->board[1][1] && $this->board[1][1] == $this->board[2][0])
            $this->fin = true;
    }


}