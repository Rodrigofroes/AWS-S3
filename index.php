<?php require 'upload.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Upload images</title>
    <style>
        html,
        body {
            height: 100%;
        }

        .centered-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>
</head>

<body class="container ">
    <div class="row centered-container">
        <div class="col-md-6">
            <h5 class="text-center">Upload images with S3</h5>
            <?php if (isset($status)) : ?>
                <div class="alert alert-<?= $option ?>" role="alert">
                    <?php echo $status ?>
                </div>
            <?php endif ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="imagens" accept="image/*" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Upload</button>
                </div>
            </form>
            <?php if (isset($link)) : ?>
                <div class="alert alert-success" role="alert">
                    <a href="<?php echo $link ?>" target="_blank"><?php echo $link ?></a>
                </div>
            <?php endif ?>
        </div>
</body>

</html>