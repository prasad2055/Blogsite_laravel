<?php
    view('back/includes/header.php');
?>
  

  <main class="container vh-100">
    <div class="row">
      <div class="col-4 bg-white py-3 my-5 mx-auto shadow-sm rounded-2">
        <div class="row">
            <div class="col text-center">
                <h1>Login</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="<?php echo url('login/check'); ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-lable">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-lable">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input" value="yes">
                        <label for="remember" class="form-check-lable">Remember Me</label>
                    </div>
                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-right me-2"></i>Login</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </main>

<?php view('back/includes/footer.php'); ?>