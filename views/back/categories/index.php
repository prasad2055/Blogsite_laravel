<?php
    view('back/includes/header.php');
    view('back/includes/nav.php');
?>
  

  <main class="container bg-white py-3 my-3 shadow-sm rounded-2">
    <div class="row">
      <div class="col">
        <h1>Categories</h1>
      </div>
      <div class="col-auto">
        <a href="<?php echo url('categories/create'); ?>" class="btn btn-primary">
             <i class="bi bi-plus-lg me-2"></i>Add Category
        </a>
      </div>
    </div>
    <div class="row">
         <div class="col-12">
               <?php if(!empty($categories['data'])): ?>
                <table class="table table-bordered table-striped table-hover table-sm">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Upated At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($categories['data'] as $category): ?>
                      <tr>
                        <td><?php echo $category->name; ?></td>
                        <td><?php echo $category->status; ?></td>
                        <td><?php echo dt_format($category->created_at); ?></td>
                        <td><?php echo dt_format($category->updated_at); ?></td>
                        <td>
                          <a href="<?php echo url("categories/edit/{$category->id}")?>" class="btn btn-primary btn-sm" title="Edit">
                              <i class="bi bi-pencil-square"></i>
                          </a>
                          <a href="<?php echo url("categories/destroy/{$category->id}"); ?>" class="btn btn-danger btn-sm delete" title="Delete">
                              <i class="bi bi-trash-fill"></i>
                          </a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
                <?php view('back/includes/pagination.php', ['pageNo' => $categories['pageNo'], 'pages' => $categories['pages'], 'url' => url('categories')]); ?>
                <?php else: ?>
                  <h4 class="text-muted fst-italic">No data found.</h4>
                  <?php endif; ?>
         </div>
    </div>
  </main>

  <?php
      view('back/includes/footer.php');
  ?>