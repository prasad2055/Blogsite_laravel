
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="<?php echo url('dashboard') ?>">Blog Site</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php if(user()->type == 'Admin'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('authors'); ?>"><i class="bi bi-people-fill me-2"></i>Authors</a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('categories'); ?>"><i class="bi bi-diagram-3-fill me-2"></i>Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('articles'); ?>"><i class="bi bi-newspaper me-2"></i>Articles</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('comments'); ?>"><i class="bi bi-chat-text me-2"></i>Comments</a>
          </li>
        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle me-2"></i><?php echo user()->name; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="<?php echo url('profile/edit'); ?>"><i class="bi bi-person-vcard me-2"></i>Edit Profile</a></li>
              <li><a class="dropdown-item" href="<?php echo url('password/edit'); ?>"><i class="bi bi-asterisk me-2"></i>Change Password</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="<?php echo url('logout'); ?>"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>