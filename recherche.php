<?php
$db_username = "root";
$db_password = "";

$conn = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', $db_username, $db_password);
var_dump($_GET);

if(isset($_GET['search'])) {
    $req = $conn->prepare("SELECT * FROM jeux WHERE titre LIKE :titre ");
    $req->execute(array(
        ":titre" => "%" . $_GET['search'] . "%"
    ));
    $search = $req->fetchAll(PDO::FETCH_ASSOC);





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
    <title>Document</title>
</head>
<body>
    <header>
        <?php require_once ("header.php")?>
    </header>
    <main>
        <?php
        foreach ($search as $key => $values)
        {
            echo "<section class='article-place'>
                    <h2 class='article-title'><a class='link-article' href='element.php?id=$values[id]'>$values[titre]</a></h2>
                    <p class='article-text'>$values[contenu]</p>
                  </section>";
        }
        ?>
    </main>
    <footer>

    </footer>
</body>
</html>