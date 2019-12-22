<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News editing</title>
</head>
<body>
<h2>Editing news</h2>

<form action="/php2/App/Admin/admin.php?id=<?php echo $_GET['id'] ?>" method="post">
    <p>
        <label for="newsHeadline">News headline</label>
        <input
            type="text"
            id="newsHeadline"
            name="newsHeadline"
            value="<?php if (isset($news)) { echo $news->article; } ?>"
        >
    </p>

    <p>
        <label for="newsDescription">Description of the news</label>
        <textarea id="newsDescription" name="newsDescription"><?php if (isset($news)) { echo $news->description; } ?></textarea>
    </p>

    <input type="submit" value="Save">
</form>

</body>
</html>
