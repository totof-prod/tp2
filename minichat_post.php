<?php


try {
    $bdd = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['pseudo']) && isset($_POST['message'])){
    $req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo, :message)');
    $req->execute(array(
        'pseudo' => $_POST['pseudo'],
        'message' =>$_POST['message']

    ));
    header('Location: mini_chat.php');
}else{

    header('Location: mini_chat.php');
}

