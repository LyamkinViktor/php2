<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
            min-width: 30%;
            max-width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <title>Admin panel</title>
</head>
<body>
    <h2>News list</h2>
    <hr>

    <p>
        <a href="/php2/templates/newsEditing.php">Create news</a>
    </p>

    <div>
        <table>
            <tr>
                <th>News</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($news as $oneNews) : ?>
            <tr>
                <td><?php echo $oneNews->article; ?></td>
                <td>
                    <a href="/php2/App/Admin/newsEditing.php?id=<?php echo $oneNews->id; ?>">Edit</a>
                    <a href="/php2/App/Admin/admin.php?delete&id=<?php echo $oneNews->id; ?>" style="color: firebrick;">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <p>
        <a href="/php2/index.php">Home page</a>
    </p>

</body>
</html>