<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yappy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a id="top"></a>
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
        <a class="navbar-brand" href=""><img src="blog.png" alt="Blog" id="brand"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="?todo=home">Home</a>
                <a class="nav-item nav-link" href="?todo=list">Posts</a>
                <a class="nav-item nav-link" href="?todo=new">Create Post</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php
        include_once "posts.php";
        $todo = $_GET['todo'] ?? 'list';
        $postsModel = new Posts("localhost", "root", "", "blog");
        switch ($todo) {
            case "home":
                include_once "home.php";
                break;
            case "list":
                include_once "postlist.php";
                break;
            case "new":
                include_once "newpost.php";
                break;
            case "add":
                $name = trim(htmlspecialchars($_POST["name"])) ?? '';
                $title = trim(htmlspecialchars($_POST["title"])) ?? '';
                $content = trim(htmlspecialchars($_POST["content"])) ?? '';
                $postsModel->addPost($name, $title, $content);
                header("Location: index.php");
                break;
            case "report":
                include_once "report.php";
                break;
            case "flag":
                $id = $_GET['id'];
                $reason = $_POST['reason'] ?? "No reason";
                $postsModel->flagPost($id, $reason);
                header("Location: index.php");
                break;
        }
        ?>
    </div>
</body>

</html>