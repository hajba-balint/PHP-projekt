<div class='row'>
    <?php
    include_once "posts.php";
    $postsModel = new Posts("localhost", "root", "", "blog");
    $order = $_GET['order'] ?? 'desc';
    if ($order == "asc") {
        $posts = $postsModel->sortAsc($postsModel->getPosts());
    } else {
        $posts = $postsModel->sortDesc($postsModel->getPosts());
    }
    ?>
    <div class="header-row">
        <h2 class='my-3' <?php if (empty($posts)){echo "style='display: none;'";}?>>All posts (<?php echo count($posts) ?>)</h2>
        <a class="sort" href="?todo=list&order=asc" <?php if ($order == "asc" || count($posts) < 2){echo "style='display: none;'";}?>>&#8613;</a>
        <a class="sort" href="?todo=list&order=desc" <?php if ($order == "desc" || count($posts) < 2){echo "style='display: none;'";}?>>&#x21a7;</a>
    </div>
    <?php
    if (empty($posts)) {
        echo "<h4>There are no posts available.</h4>";
    }
    else{
        foreach ($posts as $post) {
            echo "
            <div class='col-sm-4'>
                <div class='card'>
                    <div class='card-body'>
                        <h4>By: $post->name <span class='date'>$post->created_at</span></h4>
                        <h5 class='card-title title'>$post->title</h5>
                        <p class='card-text content'>$post->content</p>
                        <a href='?todo=report&id=$post->id' class='btn report'>Report</a>
                    </div>
                </div>
            </div>
        ";
        }
    }

    ?>
</div>