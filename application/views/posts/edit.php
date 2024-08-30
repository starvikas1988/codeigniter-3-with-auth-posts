<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
<a href="<?php echo base_url('index.php/auth/logout'); ?>">Logout</a>
    <h1>Edit Post</h1>
    <?php if($post->image): ?>
        <img src="<?php echo base_url('uploads/'.$post->image); ?>" alt="Post Image">
    <?php endif; ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $post->title; ?>" required><br>
        <label>Content:</label>
        <textarea name="content" required><?php echo $post->content; ?></textarea><br>
        <label>Upload::</label>
        <input type="file" name="image"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
