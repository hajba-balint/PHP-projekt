<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $title = trim($_POST['title'] ?? '');
  $content = trim($_POST['content'] ?? '');
  $tos = $_POST['tos'] ?? null;

  if ($name === '' || $title === '' || $content === '' || !$tos) {
    echo "All fields are required and terms must be accepted.";
    return;
  }
}
?>
<h1 class='my-3 text-center'>New Post</h1>
<div class='row'>
  <div class='col-sm-6'>
    <div class='card'>
      <div class='card-body'>
        <form method="POST" action="?todo=add" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" maxlength="15" required>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" maxlength="30" required>
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" maxlength="255" required></textarea>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="tos" name="tos" required>
            <label class="form-check-label" for="tos">I have read and accepted the <span class="hover">terms and conditions<span class="hovertext">now you can check it</span></div></label>
          </div>
          <button type="submit" class="btn btn-primary"  id="add">Add post</button>
        </form>
      </div>
    </div>
  </div>
</div>