<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
</head>
<body>
    <p>
        News: <?php echo $news->article; ?>
    </p>
    <p>
        Description: <?php  echo $news->description; ?>
    </p>
    <p>
        <?php if (isset($news->author)): ?>
            Author: <?php echo $news->author->name ?>
        <?php else: ?>
            Author unknown.
        <?php endif ?>
    </p>
</body>
</html>