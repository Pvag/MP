<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            //phpinfo();
        ?>
        <h1>This is Cane's super-awesome files uploader</h1>
        <h2>Please, feel free to experiment!</h2>
        <img id='upload_img' src='http://www.chimerarevo.com/wp-content/uploads/2012/06/Upload.jpg'/>
        <form name='carica' method='post' action='carica.php' enctype='multipart/form-data'>
        <input type='file' name='carica_file'/>
        <input type='submit' name='carica_submit' value='Carica!'/>
        </form>
        
    </body>
</html>
