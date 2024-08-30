<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>


<?php if($this->session->flashdata('success')): ?>
    <p><?php echo $this->session->flashdata('success'); ?></p>
<?php endif; ?>
    <h1>Login</h1>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <?php if($this->session->flashdata('error')): ?>
        <p><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
</body>
</html>
