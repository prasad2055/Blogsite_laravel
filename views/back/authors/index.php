<?php
    view('back/includes/header.php');
    view('back/includes/nav.php');
?>
  

  <main class="container bg-white py-3 my-3 shadow-sm rounded-2">
    <div class="row">
      <div class="col">
        <h1>Authors</h1>
      </div>
      <div class="col-auto">
        <a href="<?php echo url('authors/create'); ?>" class="btn btn-primary">
             <i class="bi bi-plus-lg me-2"></i>Add Author
        </a>
      </div>
    </div>
    <div class="row">
         <div class="col-12">
               <?php if(!empty($authors['data'])): ?>
                <table class="table table-bordered table-striped table-hover table-sm">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Upated At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($authors['data'] as $author): ?>
                      <tr>
                        <td><?php echo $author->name; ?></td>
                        <td><?php echo $author->email; ?></td>
                        <td><?php echo $author->phone; ?></td>
                        <td><?php echo $author->address; ?></td>
                        <td><?php echo $author->status; ?></td>
                        <td><?php echo dt_format($author->created_at); ?></td>
                        <td><?php echo dt_format($author->updated_at); ?></td>
                        <td>
                          <a href="<?php echo url("authors/edit/{$author->id}")?>" class="btn btn-primary btn-sm" title="Edit">
                              <i class="bi bi-pencil-square"></i>
                          </a>
                          <a href="<?php echo url("authors/destroy/{$author->id}"); ?>" class="btn btn-danger btn-sm delete" title="Delete">
                              <i class="bi bi-trash-fill"></i>
                          </a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
                <?php view('back/includes/pagination.php', ['pageNo' => $authors['pageNo'], 'pages' => $authors['pages'], 'url' => url('authors')]); ?>
                <?php else: ?>
                  <h4 class="text-muted fst-italic">No data found.</h4>
                  <?php endif; ?>
         </div>
    </div>
  </main>

  <?php
      view('back/includes/footer.php');
  ?>