<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogsite</title>

    <link rel="stylesheet" href="<?php echo url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/front.css'); ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo url('/') ?>">Blog Site</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                     <?php 
                     $category = new App\Models\Category;
                     $categories = $category->where('status', 'Active')->select('id', 'name')->get();

                     foreach($categories as $topic):
                     ?>
                     <li class="nav-item">
                        <a href="<?php echo url("pages/category/{$topic->id}"); ?>" class="nav-link"><?php echo $topic->name; ?></a>
                     </li>
                     <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>