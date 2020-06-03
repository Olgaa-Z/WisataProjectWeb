<!DOCTYPE html>
<html>       
<head>
    <meta charset="UTF-8">   
    <title>Upload File Wisata</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>       
</head>       
<body>
    <br><br><br>
    <div class="container"><p><a class="btn btn-info" href="<?php echo site_url('Product');?>">Upload</a></p>

                    <form method="post" action="<?php echo site_url('Wisata/addWisata'); ?>" 
                          enctype="multipart/form-data"> 

                        <div class="form-group"> 
                            <label for="usr">Nama Wisata :</label>
                            <input type="text" class="form-control" name="nama_wisata" required="">
                        </div>

                        <div class="form-group"> 
                            <label for="usr">Deskripsi :</label>
                            <input type="text" class="form-control" name="deskripsi" required="">
                        </div>

                        <div class="form-group">
                            <label for="comment">Alamat :</label>
                            <textarea class="form-control" rows="15" name="alamat" required=""></textarea>
                        </div>

                        <div class="form-group">
                            <label for="usr"> Foto :</label>
                            <input type="file"  class="form-control" name="files" required="">
                        </div>

                        <div class="form-group"> 
                            <label for="usr">Latitude :</label>
                            <input type="text" class="form-control" name="latitude" required="">
                        </div>

                        <div class="form-group">
                            <label for="usr"> Longitude :</label>
                            <input type="text" class="form-control" name="longitude" required="">
                        </div>

                        <div class="form-group">
                            <label for="usr"> Notelp :</label>
                            <input type="text" class="form-control" name="notelp" required="">
                        </div>

                        


                        <button style ="margin-bottom:25px" class="btn btn-success" 
                                type="submit">Save</button>
                    </form>
                </div>       
   </body>
   </html>