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
    <input type="title" class="form-control" id="content" name="content">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="completed" name="completed">
    <label class="form-check-label" for="completed">Kész</label>
  </div>
  <button type="submit" class="btn btn-primary">Felvesz</button>
</form>