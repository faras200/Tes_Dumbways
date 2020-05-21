<?php
require 'functions.php';

$course = query("SELECT * FROM course, author WHERE course.id_author = author.id_author");

// var_dump($course); die;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Corse</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="container mt-5">
        <div class="row">
        <h1 class="col-md-6">Faras-Course</h1>
        <a class="btn-primary btn" href="add_course.php">Add Course</a>
        <a class="btn-primary btn" href="add_author.php">Add Author</a>
        <a class="btn-primary btn" href="add_content.php">Add Content</a>
        </div>
    </header>

    <div class="container-fluid mt-5">
        <div class="row">
            <?php foreach($course as $row): ?>
            <div class="col-md-3 mt-3">
            <div class="card" >
            
            <div class="home-blog-post">
            <div class="image">
              <img src="gambar/<?= $row["thumbnail"];?>"" class=" news-img ">
              <div class="overlay d-flex align-items-center justify-content-center">
              <a href="hapus.php?id_course=<?= $row["id_course"];?>" class="btn">Delete</a>
              <a href="ubah.php?id_course=<?= $row["id_course"];?>" class="btn">Ubah</a>
              </div>
            </div>
          </div>
          <div class="card-body ">
                    <div class="clearfix">
                    <h4 class="float-left"><?= $row[1]; ?></h4>
                    <p class="float-right mt-1 clearfix">Author : <?= $row["name"] ?></p>
                    </div>
                    <p class=""><?= $row["deskripsi"] ?></p>
                    <div class="text-center ">
                    <a href="detail.php?id_course=<?= $row["id_course"];?>"  class="btn btn-info ">Detail</a>
                    </div>
                </div>
            </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>

</body>
</html>
