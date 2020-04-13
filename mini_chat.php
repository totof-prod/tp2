<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP_2 Le mini chat</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<div id="creat_message">
    <form method="post" action="minichat_post.php">
        <p><label>Votre pseudo:<input type="text" name="pseudo" ></label></p>
        <p><label>Votre message:<input type="text" name="message" ></label></p>
        <input type="submit" value="Envoyer">
    </form>
</div>
<div id="read_message">
    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $response = $bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 10 ' );
    while ($donnees = $response->fetch())
    {
      echo  '<p><strong>' . $donnees['pseudo'] . '</strong> : ' . $donnees['message'] . '</p>';
    }
    ?>

</div>
</body>
</html>