<?php
    view('back/includes/header.php');
    view('back/includes/nav.php');
?>
  

  <main class="container bg-white py-3 my-3 shadow-sm rounded-2">
    <div class="row">
      <div class="col-5 mx-auto">
        <h1>Change Password</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-5 mx-auto">
        <form action="<?php echo url('password/update'); ?>" method="POST">
            <div class="mb-3">
              <label for="old_password" class="form-lable">Old Password</label>
              <input type="password" name="old_password" id="old_password" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-lable">New Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="confirm_password" class="form-lable">Confirm Password</label>
              <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
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