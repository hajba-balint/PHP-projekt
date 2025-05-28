<?php
    include_once "posts.php";
    $postsModel = new Posts("localhost", "root", "", "blog");
    $order = $_GET['order'] ?? 'desc';
    if ($order == "asc") { ///////////////////////////////////// only put the correct sorting button
        $posts = $postsModel->sortAsc($postsModel->getPosts());
    } else {
        $posts = $postsModel->sortDesc($postsModel->getPosts());
    }
?>
    <div class="header-d-flex flex-column align-items-center text-center my-3">
        <h2 class='my-3 text-center' <?php if (empty($posts)){echo "style='display: none;'";}?>>All posts (<?php echo count($posts) ?>)</h2>
        <a class="sort" href="?todo=list&order=asc" <?php if ($order == "asc" || count($posts) < 2){echo "style='display: none;'";}//////?>>Sort:  &#8613;</a>
        <a class="sort" href="?todo=list&order=desc" <?php if ($order == "desc" || count($posts) < 2){echo "style='display: none;'";} ///  no way to sort if there are less than 2 posts ?>> Sort:  &#x21a7;</a>
    </div>
<?php
    if (empty($posts))
    {
        echo "<div class='text-center'>";
        echo "<h4 class='my-5'>There are no posts available.</h4>";
        echo "<p>You can create your own post here:</p>";
        echo "<a class='btn btn-primary' href='?todo=new'>Create a Post</a>";
        echo "</div>";
    }
    else
    {
        echo "<div class='row'>";      ////
        foreach ($posts as $post)
        {
            echo "
            <div class='col-sm-6'>
                <div class='card'>
                    <div class='card-body'>
                        <h4><span class='date'>$post->created_at</span>By: $post->name </h4>
                        <h5 class='card-title title'>$post->title</h5>
                        <p class='card-text content'>$post->content</p>
                        <a href='?todo=report&id=$post->id' class='btn report'>Report</a>
                    </div>
                </div>
            </div>
        ";
        }
        echo "</div>";                 ////
    }
?>