<?php
include_once "posts.php";
$postsModel = new Posts("localhost", "root", "", "blog");
$posts = $postsModel->getPosts();
echo "
    <h2 class='my-3'>All posts</h2>
    <div class='row'>
    ";
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
echo "</div>"

?>