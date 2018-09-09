<?php require('parts/globals.php')?>

    
 <?php  // Create connection
$conn = mysqli_connect('localhost', 'root', '', 'clean_blog');
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
  
$sql = "SELECT posts.id, title, content, posts.created_at, first_name, last_name "
        ."FROM posts "
        ."INNER JOIN users ON users.id=posts.user_id "
        ."ORDER BY posts.created_at DESC";

$result = mysqli_query($conn, $sql);

if ( !$result) {
    die ("Error: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
    
<?php require('parts/header.php')  ?>
     
<body>

    <?php require('parts/navigation.php') ?>

    <?php require('parts/header_image.php') ?>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
                <?php if($user['admin']==1): ?>
                <a href="new_post.php" class="btn btn-primary pull-right"><i class="fa fa-trash"></i>New Post</a>
                 <?php endif ?>
                
                <?php while($post = mysqli_fetch_assoc($result)): ?>
                <div class="post-preview">  
                    <a href="post.php?id=<?php echo $post['id'] ?>">
                        <h2 class="post-title">
                            <?php echo $post['title'] ?>
                        </h2>
                        <h3 class="post-subtitle">
                           <?php echo substr($post['content'], 0, 40) ?>
                            
                            <?php if($user['admin']==1 ): ?>
                            <a href="actions/delete_post.php?id_post=<?php echo $post['id'] ?>" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Delete</a>
                            <?php endif ?>
                        </h3> 
                    </a>
                    <p class="post-meta">Posted by <?php echo $post['first_name'].' '.$post['last_name']?> on <?php echo date('d/m/Y', strtotime($post['created_at'])) ?> </p>
                </div>
                <hr>
                 <?php endwhile ?>

            </div>
        </div>
    </div>

    <hr>

    <?php require('parts/footer.php') ?>

</body>

</html>
