<?php
    view('back/includes/header.php');
    view('back/includes/nav.php');
?>
  

  <main class="container bg-white py-3 my-3 shadow-sm rounded-2">
    <div class="row">
      <div class="col">
        <h1>Comments</h1>
      </div>
    </div>
    <div class="row">
         <div class="col-12">
               <?php if(!empty($comments['data'])): ?>
                <table class="table table-bordered table-striped table-hover table-sm">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Article</th>
                      <th>Comment</th>
                      <th>Created At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($comments['data'] as $comment): ?>
                      <tr>
                        <td><?php echo $comment->name; ?></td>
                        <td><?php echo $comment->email; ?></td>
                        <td><?php echo $comment->article()->first()->name; ?></td>
                        <td><?php echo $comment->content; ?></td>
                        <td><?php echo dt_format($comment->created_at); ?></td>
                        <td>
                          <a href="<?php echo url("comments/destroy/{$comment->id}"); ?>" class="btn btn-danger btn-sm delete" title="Delete">
                              <i class="bi bi-trash-fill"></i>
                          </a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
                <?php view('back/includes/pagination.php', ['pageNo' => $comments['pageNo'], 'pages' => $comments['pages'], 'url' => url('comments')]); ?>
                <?php else: ?>
                  <h4 class="text-muted fst-italic">No data found.</h4>
                  <?php endif; ?>
         </div>
    </div>
  </main>

  <?php
      view('back/includes/footer.php');
  ?>