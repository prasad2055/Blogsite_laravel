<?php view('back/front/includes/header.php');?>


<main class="container bg-white py-3">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h1><?php echo $article->name; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3 text-success text-center">
            <i class="bi bi-diagram-3-fill me-2"></i>
            <?php  $category = $article->category()->select('id', 'name')->first(); ?>
            <a href="<?php echo url("pages/category/{$category->id}"); ?>"
                class="link-success text-decoration-none me-3"><?php echo $category->name; ?></a>
            <?php  $author = $article->user()->select('name')->first(); ?>
            <i class="bi bi-person me-2"></i>
            <span class="me-3"><?php echo $author->name; ?></span>
            <i class="bi bi-clock me-2"></i>
            <?php echo dt_format($article->published_at); ?>
        </div>
    </div>
    <div class="row">
        <?php if(!empty($article->image)): ?>
        <div class="col-12 mb-3">
            <img src="<?php echo url("assets/images/{$article->image}"); ?>" class="img-fluid">
        </div>
        <?php endif; ?>
        <div class="col-12">
            <?php echo $article->content, 0, 1000; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 my-3">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <h3><i class="bi bi-chat me-2"></i>Add Comment</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="<?php echo url("pages/comment/{$article->id}")?>" method="POST">
                        <div class="mb-3">
                            <lable for="name" class="form-lable">Name</lable>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <lable for="email" class="form-lable">Email</lable>
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <lable for="content" class="form-lable">Content</lable>
                            <textarea name="content" id="content" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-chat-dots me-2"></i>Add Comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <h3><i class="bi bi-chat-text me-2"></i>Comments</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if(!empty($comments)): ?>
                    <?php foreach($comments as $comment): ?>
                    <div class="text-bg-dark p-3 mb-3 rounded-3">
                        <?php echo $comment->content; ?>
                        <br>
                        <br>
                        <small class="fst-italic">
                            <i class="bi bi-person me-2"></i><?php echo $comment->name; ?>
                            (<?php echo $comment->email; ?>)
                            <i class="bi bi-clock ms-3 me-2"></i><?php echo dt_format($comment->created_at); ?>
                        </small>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="text-bg-dark text-center fst-italic p-3 mb-3 rounded-3">
                        <small>No Comment Added.</small>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</main>

<?php
      view('back/front/includes/footer.php');
  ?>