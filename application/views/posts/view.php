<!DOCTYPE html>
<html>
<head>
    <title>View Post</title>
</head>
<body>
<a href="<?php echo base_url('auth/logout'); ?>">Logout</a>
<table border="1">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
        </tr>
      
        <tr>
            <td><?php echo $post->title; ?></td>
            <td><?php echo $post->content; ?></td>
            <?php if($post->image): ?>
               <td><img src="<?php echo base_url('uploads/'.$post->image); ?>" alt="Post Image"></td> 
            <?php endif; ?>
        </tr>
    
    </table>
</body>
</html>
