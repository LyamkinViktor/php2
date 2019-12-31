<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
</head>
<body>

    <?php foreach ($lastThreeNews as $news): ?>
        <p>
            <a href="/php2/news.php?id=<?php echo $news->id; ?>">
                <?php  echo $news->article; ?>
            </a><br>

            <?php if (isset($news->author)): ?>
                Author: <?php echo $news->author->name ?>
            <?php else: ?>
                Author unknown.
            <?php endif ?>
        </p>
    <?php endforeach ?>

    <div>
        <a href="/php2/App/Admin/admin.php">
            Admin panel
        </a>
    </div>
</body>
</html>