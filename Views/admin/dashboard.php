<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Buttons</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        button {
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<table id="myTable">
    <h2>My table</h2>
     <a href="CreatCategory">Add</a>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Category as $cat) {?>
        <tr>
            <td><?= $cat['id'] ?></td>
            <td><?= $cat['name'] ?></td>
            <td>
                <a href="Updatecategory?id=<?= $cat['id'] ?>">Update</a>
                <a href="deletecategory?id=<?= $cat['id']?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


</body>
</html>
