<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
<a href="<?php echo base_url('index.php/auth/logout'); ?>">Logout</a>
<?php if(isset($error)): ?>
        <p><?php print_r($error); ?></p>
    <?php endif; ?>
    <h1>Create Post</h1>
    <form method="POST" action="" enctype="multipart/form-data">
    <label>Title:</label>
        <input type="text" name="title" placeholder="Title" required><br>
        <label>Content:</label>
        <textarea name="content" placeholder="Content" required></textarea><br>
        <label>Upload:</label>
        <input type="file" name="image"><br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
