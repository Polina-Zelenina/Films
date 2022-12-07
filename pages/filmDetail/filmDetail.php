<!DOCTYPE html>
<html lang="en">
<head>
    <link href="/pages/filmDetail/style.css" rel="stylesheet" />
</head>
<body>
    <h1><?php echo $filmDetail[0]['name'] ?></h1>
    <p>
        <span class="sub-title">Genre:</span> <? echo $filmDetail[0]['genre'] ?>
    </p>
    <p>
        <span class="sub-title">Actors:</span> <? echo $filmDetail[0]['actors'] ?>
    </p>
    <p>
        <span class="sub-title">Release Date:</span> <? echo $filmDetail[0]['date'] ?>
    </p>
    <p>
        <span class="sub-title">Description:</span> <? echo $filmDetail[0]['description'] ?>
    </p>
</body>
</html>