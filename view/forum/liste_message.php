<?php
    $sujets = $result["data"]["sujets"];
    $messages   = $result["data"]["messages"];

    echo "<h1> Messages - tous sujets</h1>";
    if(!empty($messages)){
        foreach($messages as $message){

            echo "<p>",
                    "<a href='?ctrl=forum&action=voir&id=", $message->getId(), "'>", $message, "</a>",
                "</p>";
        }
    }
    else echo "<p>Pas de messages disponibles...</p>";

    echo "<h2>Filtrer par sujet</h2>";
    echo "<p>";
    if(!empty($sujets)){
        foreach($sujets as $s){
            echo "<a href='?ctrl=forum&action=listeParSujet&id=", $s->getId(), "'>", $s, "</a>&nbsp;";
        }
    }
    else echo "Pas de sujets disponibles..."; 
    echo "</p>";