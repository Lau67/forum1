<?php
    $sujets = $result["data"];
?>

<form action="index.php?ctrl=forum&action=newSujet" method="post">
    
    
    <p>
        <label for="titre">Titre :</label>
        <input type="text" name="titre" required>
    </p>
   
    <p>
        <input id="valid" type='submit' value="Ajouter Sujet">
    </p>
</form>