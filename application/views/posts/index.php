<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>
<a href="<?php echo base_url('index.php/auth/logout'); ?>">Logout</a>
    <h1>Posts</h1>
    <a href="<?php echo base_url('index.php/post/create'); ?>">Create Post</a>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?php echo $post->title; ?></td>
            <td>
                <a href="<?php echo base_url('index.php/post/view/'.$post->id); ?>">View</a>
                <a href="<?php echo base_url('index.php/post/edit/'.$post->id); ?>">Edit</a>
                <a href="<?php echo base_url('index.php/post/delete/'.$post->id); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
