<form method="POST" action="?todo=add">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
    <div class="mb-3">
    <label for="title" class="form-label">Content</label>
    <textarea name="content" id="content" class="form-control"></textarea>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="tos" name="tos">
    <label class="form-check-label" for="tos">I have read and accepted the <div class="hover">terms and conditions<span class="hovertext">just check it bro</span></div></label>
  </div>
  <button type="submit" class="btn btn-primary">Add post</button>
</form>