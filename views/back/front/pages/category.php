<?php view('back/front/includes/header.php'); ?>

    <main class="container bg-white py-3">
        <div class="row">
        <div class="col-12 text-center mb-3">
            <h1><?php echo $category->name; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-3">
                <hr>
            </div>
        </div>
        <div class="row row-cols-3">
            <?php foreach($articles['data'] as $article): ?>
                <div class="col mb-3">
                    <div class="row">
                        <div class="col-5">
                        <?php if(!empty($article->image)): ?>
                             <img src="<?php echo url("assets/images/{$article->image}"); ?>" class="img-fluid border rounded-2">
                             <?php else: ?>
                                <img src="<?php echo url("assets/images/placeholder.jpg"); ?>" class="img-fluid border rounded-2">
                        <?php endif; ?>
                        </div>
                        <div class="col-7">
                            <?php echo $article->name; ?>
                            <br>
                            <a href="<?php echo url("pages/article/{$article->id}"); ?>" class="btn btn-success btn-sm mt-3">
                                 <i class="bi bi-book me-2"></i>Read Articles
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
        <div class="col-12">
            <?php view('back/front/includes/pagination.php', ['pages'=> $articles['pages'], 'pageNo' => $articles['pageNo'], 'url' => url("pages/category/{$category->id}")]); ?>
        </div>
        </div>
    </main>

<?php view('back/front/includes/footer.php'); ?>