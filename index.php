<?php
require "helpers.php";

// require "router.php";

//connect to our MySQL database.
 
$dns="mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";

$pdo = new PDO($dns);

$statement = $pdo->prepare("select * from posts");

$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);


foreach ($posts as $post) {
    # code...
    echo "<li>".$post['title']."</li>";
}
