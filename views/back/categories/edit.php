<?php
    view('back/includes/header.php');
    view('back/includes/nav.php');
?>
  

  <main class="container bg-white py-3 my-3 shadow-sm rounded-2">
    <div class="row">
      <div class="col-5 mx-auto">
        <h1>Edit Category</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-5 mx-auto">
        <form action="<?php echo url("categories/update/{$category->id}"); ?>" method="POST">
            <div class="mb-3">
              <label for="name" class="form-lable">Name</label>
              <input type="text" name="name" id="name" class="form-control" value="<?php echo $category->name; ?>" required>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-select" required>
                <option value="Active" <?php echo $category->status == 'Active' ? 'selected' : ''; ?>>Active</option>
                <option value="Inactive" <?php echo $category->status == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
              </select>
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