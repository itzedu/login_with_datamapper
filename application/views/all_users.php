<html>
<head>
    <title>All Users</title>
</head>
<body>
<?php
    if ($this->session->flashdata('success'))
        {
          echo $this->session->flashdata('success');
        }
?>
    <table>
        <thead>
            <tr>
                <td>Email</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
<?php
        foreach($users as $user)
        {   ?>
            <tr>
                <td><?= $user['email'] ?></td>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['last_name'] ?></td>
                <td><a href="/users/destroy_user/<?= $user['id'] ?>">Delete</a></td>
            </tr>
<?php
        }   ?>
        </tbody>
    </table>
</body>
</html>