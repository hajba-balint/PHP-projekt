<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Blog</h1>
        <?php
            include_once "posts.php";
            $todo = $_GET['todo'] ?? 'list';
            $postsModel = new Posts("localhost", "root", "", "blog");
            switch($todo){
                case "list":
                    include_once "postlist.php";
                    break;
                case "new":
                    include_once "newpost.php";
                    break;
                case "add":
                    $name = htmlspecialchars($_POST["name"]);
                    $title = htmlspecialchars($_POST["title"]);
                    $content = htmlspecialchars($_POST["content"]);
                    $postsModel->addPost($name, $title, $content);
            }
        ?>
    </div>
</body>
</html>