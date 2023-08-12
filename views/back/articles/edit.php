<?php
    view('back/includes/header.php');
    view('back/includes/nav.php');
?>
  

  <main class="container bg-white py-3 my-3 shadow-sm rounded-2">
    <div class="row">
      <div class="col-10 mx-auto">
        <h1>Edit Article</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-10 mx-auto">
        <form action="<?php echo url("articles/update/{$article->id}"); ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
              <label for="name" class="form-lable">Name</label>
              <input type="text" name="name" id="name" class="form-control" value="<?php echo $article->name; ?>" required>
            </div>
            <div class="mb-3">
              <label for="content" class="form-lable">Content</label>
              <textarea name="content" id="content" class="form-control" required><?php echo $article->content; ?></textarea>
            </div>
            <div class="mb-3">
              <label for="file" class="form-lable">Image</label>
              <input type="file" name="file" id="file" class="form-control" accept="image/*">
                    <div id="img-container">
                        <?php if(!empty($article->image)): ?>
                            <img src="<?php echo url("assets/images/{$article->image}") ?>" class="img-fluid mt-3">
                        <?php endif; ?>
                    </div>
            </div>
            <div class="mb-3">
              <label for="category_id" class="form-label">Status</label>
              <select name="category_id" id="category_id" class="form-select" required>
                <?php foreach($categories as $category): ?>
                <option value="<?php echo $category->id; ?>" <?php echo $article->category_id == $category->id ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-select" required>
                <option value="Draft" <?php echo $article->status == 'Draft' ? 'selected' : ''; ?>>Draft</option>
                <option value="Published" <?php echo $article->status == 'Published' ? 'selected' : ''; ?>>Published</option>
                <option value="Unpublished" <?php echo $article->status == 'Unpublished' ? 'selected' : ''; ?>>Unpublished</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="published_at" class="form-lable">Published At</label>
              <input type="datetime-local" name="published_at" id="published_at" class="form-control" value="<?php echo !empty(@$article->published_at) ? dt_format($article->published_at, 'Y-m-d\TH:i') : "" ?>">
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-2"></i>Save
              </button>
            </div>
      </form>
      </div>
    </div>
  </main>

  <?php
      view('back/includes/footer.php');
  ?>