<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>uploadFile</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        if (isset ($_POST['upload'])){
            $blacklist = ['.php', '.phtml','.html', '.exe', '.js'];
            foreach ($blacklist as $value) {
                if (preg_match("/$value$/", $_FILES['im']['name']))
                    exit('Це розширення завантажити неможливо');
            }
            $upload ='images/'.$_FILES['im']['name'];
            move_uploaded_file($_FILES['im']['tmp_name'], $upload);
        }
    ?>
    <form action="index.php" method="post" enctype="multipart/form-data" name="upload">
        <p>
            <input type="file" name="im">
        </p>
        <p>
            <input type="submit" name="upload" value="Завантажити файл">
        </p>
    </form>
</body>
</html>