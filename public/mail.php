<?php
    require_once "../static/db.php";
    require_once "../private/managers/EmailManager.php";
    require_once "../private/managers/gameManager.php";
    $email = $_GET['email'];
    $list = "";
    $games = gameManager::select2($_GET['id']); 
                        foreach($games as $game){
                            $text = "$game->name ($game->platform), ";
                            $list .= $text;
                        }
    EmailManager::sendEmail("$email", "Gekochte games", "$list");
    header("location: index.php")
?>