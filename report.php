<h2 class='my-3'>Report post</h2>
<div class='row'>
    <?php
    include_once "posts.php";
    $id = $_GET['id'];
    $postsModel = new Posts("localhost", "root", "", "blog");
    $posts = $postsModel->postById($id);
    foreach ($posts as $post) {
        echo "
        <div class='col-sm-4'>
            <div class='card'>
                <div class='card-body'>
                    <h4>By: $post->name <span class='date'>$post->created_at</span></h4>
                    <h5 class='card-title title'>$post->title</h5>
                    <p class='card-text content'>$post->content</p>
                </div>
            </div>
        </div>
    ";
    }
    echo "</div>"
    ?>
<form method="POST" action='?todo=flag&id=<?php echo $id ?>'>
  <div class="mb-3">
    <label for="reason" class="form-label">Reason</label>
    <input type="text" class="form-control" id="reason" name="reason">
  </div>
  <button type="submit" class="btn btn-primary">Send report</button>
</form>