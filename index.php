<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Contoh Rename Sebelum Upload </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<?php
// check ukuran gambar

if (isset($_POST["upload"])) {
    if ($_FILES["file_image"]["name"] != '') // check file sudah dipilih atau belum
    {
        $allowed_ext = array("jpg", "jpeg", "png"); // extension file yang di ijinkan
        $ext = pathinfo($_FILES["file_image"]["name"], PATHINFO_EXTENSION); // mengecek extension dengan fungsi php (cek dokumentasi php)
        if (in_array($ext, $allowed_ext)) // check untuk validextension extension
        {
            if ($_FILES["file_image"]["size"] < 500000) // check ukuran gambar sesuai tidak
            {

                $name = 'GambarRename-' . time() . '.' . $ext; // rename nama file gambar
                $path = "images/" . $name; // image upload path
                move_uploaded_file($_FILES["file_image"]["tmp_name"], $path);
                echo '<script>alert("Gambar berhasil terupload")</script>';
            } else {
                echo '<script>alert("Ukuran Gambar Terlalu Besar")</script>';
            }
        } else {
            echo '<script>alert("Tidak Sesuai Image File")</script>';
        }
    } else {
        echo '<script>alert("Silahkan pilih file gambar")</script>';
    }
}

?>

<body>

    <div class="container">
        <p></p>
        <div class="card">
            <div class="card-header">
                Contoh Rename Sebelum Upload
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" class="form-inline">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="file_image" placeholder="Upload Gambar..." aria-label="Upload Gambar..." aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="upload">Upload</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

</html>