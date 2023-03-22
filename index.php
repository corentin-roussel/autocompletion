<?php
$db_username = "root";
$db_password = "";

$conn = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', $db_username, $db_password);


if(isset($_GET['find']))
{
    $req = $conn->prepare("SELECT titre FROM jeux WHERE titre LIKE :titre ");
    $req->execute(array(
        ":titre" => "%" . $_GET['find'] . "%"
    ));
    $search = $req->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode($search, JSON_PRETTY_PRINT);

    echo $json;

    die();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="script.js"></script>
    <title>Accueil</title>
</head>
<body>
    <header>
        <?php require_once ("header.php")?>
    </header>
    <main>

    </main>
    <footer>

    </footer>
</body>
</html>
