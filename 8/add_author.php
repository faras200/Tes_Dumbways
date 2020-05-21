<?php

require 'functions.php';

if (isset($_POST["submit"]) ) {
    // var_dump($_POST); die;
    if(addAuthor($_POST) > 0){

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
                document.location.href = 'add_author.php';
            </script>
        ";
    }
}

?>

<!DOECTYPE html>
<html>
    <head>
        <title>
            Add Author
        </title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
    <div class="bg">
        <header class="header">
            <h1 class="h1 text-center mt-4 mb-5">ADD AUTHOR</h1>
        </header>
        <div class="container text-center">
            <div class="col-md-8 offset-md-2">
                <a class="btn btn-secondary mb-5" href="index.php"><< Ke Home</a>
                <form class="form pt-3 mb-3" action="" method="post">
                    <div class="form-group mb-4">
                        <label for="name">name :</label>
                        <input type="text" id="name" name="name" required placeholder="Masukan nama" class="form-control">
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