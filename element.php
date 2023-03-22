<?php

$db_username = "root";
$db_password = "";

$conn = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', $db_username, $db_password);

if(isset($_GET['id']))
{
    $req = $conn->prepare("SELECT * FROM jeux WHERE id = :id");
    $req->execute([
        ":id" => $_GET['id']
    ]);
    $article = $req->fetch(PDO::FETCH_ASSOC);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main>
        <?php echo "<section class='article-place'>
                <h2 class='article-title'>$article[titre]</h2>
                <p class='article-text'>$article[contenu].</p>
              </section>"; ?>
    </main>
</body>
</html>
