<?php

require 'functions.php';

if (isset($_POST["submit"]) ) {
    // var_dump($_POST); die;

    if (empty($_POST["author"])){
        echo "
            <script>
                alert('Nama Author harus dipilih!');
                document.location.href = 'add_course.php';
            </script>
        ";
    }


    if(addCourse($_POST) > 0){

        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }else{

        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = ;
            </script>
        ";
    }
}

?>

<!DOECTYPE html>
<html>
    <head>
        <title>
            Add Course
        </title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
    <div class="bg">
        <header class="header">
            <h1 class="h1 text-center mt-4 mb-5">ADD COURSE</h1>
        </header>
        <div class="container text-center">
            <div class="col-md-8 offset-md-2">
                <a class="btn btn-secondary mb-5" href="index.php"><< Ke Home</a>
                <form class="form pt-3 mb-3" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <label for="name">Nama :</label>
                        <input type="text" id="name" name="name" required placeholder="Masukan nama" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="thumb">Thumnail :</label>
                        <input type="file" id="thumb" name="thumbnail"  class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label>Author :</label>
                        <select name="author" class="form-control  custom-select" >
				            <option disabled selected> Pilih </option>
				            <?php 
				                $author = query("SELECT * FROM author");
				                foreach($author as $row) :
				            ?>
				            <option  value="<?=$row['id_author']?>"><?=$row['name']?></option> 
				            <?php endforeach ?>
			            </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="durasi">Durasi :</label>
                        <input type="text" id="durasi" name="durasi" required placeholder="Masukan Durasi" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="deskripsi">Deskripsi :</label>
                        <input type="text" id="deskripsi" name="deskripsi" required placeholder="Masukan Deskripsi" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <button type="submit" name="submit" class="btn btn-primary">Tambah !!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>