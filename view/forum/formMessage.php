<?php
    $messages = $result["data"];
?>

<form action="index.php?ctrl=forum&action=newMessage" method="post">
    
    
    <p>
        <label for="message">Message :</label>
        <input type="text" name="message" required>
    </p>
   
    <p>
        <input id="valid" type='submit' value="Ajouter Message">
    </p>
</form>