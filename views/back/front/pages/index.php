<?php view('back/front/includes/header.php');?>


<main class="container bg-white py-3">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h1><?php echo $latest->name; ?></h1>
        </div>
    </div>
    <div class="row">
        <?php if(!empty($latest->image)): ?>
        <div class="col-6">
            <img src="<?php echo url("assets/images/{$latest->image}"); ?>" class="img-fluid">
        </div>
        <?php endif; ?>
        <div class="col">
            <?php echo substr(strip_tags($latest->content), 0, 1000); ?>.....
            <br>
            <a href="<?php echo url("pages/article/{$latest->id}"); ?>" class="btn btn-success btn-sm mt-3">
                <i class="bi bi-book me-2"></i>Read More
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 my-3">
            <hr>
        </div>
    </div>
    <div class="row row-cols-3">
        <?php foreach($articles as $article): ?>
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
                        <i class="bi bi-book me-2"></i>Read Article
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
</main>

<?php
      view('back/front/includes/footer.php');
  ?>