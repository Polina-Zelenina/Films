<!DOCTYPE html>
<html lang="en">
<head>
    <link href="/pages/favourites/style.css" rel="stylesheet" />
</head>
<body>
    <h1 class="title">Favourites</h1>
    <?php foreach($films as $film) { ?>
        <div class="film">
            <div>
                <p class="film-name"><?php echo $film['name'] ?></p>
                <p><?php echo $film['description'] ?></p>
            </div>
        </div>
    <?php }?>
</body>
</html>