<?php
    view('back/includes/header.php');
    view('back/includes/nav.php');
?>
  

  <main class="container bg-white py-3 my-3 shadow-sm rounded-2">
    <div class="row">
      <div class="col-5 mx-auto">
        <h1>Edit Profile</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-5 mx-auto">
        <form action="<?php echo url('profile/update'); ?>" method="POST">
            <div class="mb-3">
              <label for="name" class="form-lable">Name</label>
              <input type="text" name="name" id="name" class="form-control" value="<?php echo $user->name; ?>" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-lable">Email</label>
              <input type="email" name="email" id="email" class="form-control-plaintext" value="<?php echo $user->email; ?>" readonly>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-lable">Phone</label>
              <input type="phone" name="phone" id="phone" class="form-control" value="<?php echo $user->phone; ?>" required>
            </div>
            <div class="mb-3">
              <label for="address" class="form-lable">Address</label>
              <textarea name="address" id="address" class="form-control" required><?php echo $user->address; ?></textarea>
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