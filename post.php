<?php require('parts/globals.php');

// create connnection
$conn = mysqli_connect('localhost', 'root', '', 'clean_blog');

//Check connection
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

$post_id = $_GET['id'];

$sql = "SELECT posts.id, title, content, posts.created_at, first_name, last_name "
        ."FROM posts "
        ."INNER JOIN users ON users.id=posts.user_id "
        . "WHERE posts.id=$post_id";

$result = mysqli_query($conn, $sql);

if(!$result){
    die("Error ".mysqli_error($conn));
}

if(mysqli_num_rows($result)>0){
 $post = mysqli_fetch_assoc($result);

}else{
    header('location: index.php');
    exit;
}

?>
<html lang="en">
 
<?php require('parts/header.php')  ?>
   
    
<body>

    <?php require('parts/navigation.php') ?>

    <?php require('parts/header_image.php') ?>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="pull-right">
                        <div><i><?php echo $post['first_name'].' '.$post['last_name'] ?></i></div>
                        <small><i><?php echo date('d/m/Y', strtotime($post['created_at'])) ?></i></small>
                    </div>

                    <h2><?php echo $post['title'] ?></h2>

                    <p><?php echo $post['content'] ?></p>
                    
                    <hr>
                   <?php if($user): ?>
                    <div class="add-comment">
                        <form action="actions/add_comment_to_post.php" method="post">
                            <input type="hidden" name="post_id" value="<?php echo $post['id'] ?>">
                            <p>Add new comment:</p>
                            <textarea name="comment" class="form-control"></textarea>
                                <input type="submit" value="submit" class="btn btn-default pull-right" style="margin-top:10px" />
                        </form>
                        <br>
                    </div>
                    <?php endif ?> 
                    
         <?php
         $sql = "SELECT comments.id, text, first_name, last_name, user_id, comments.created_at "
                ."FROM comments "
                ."INNER JOIN users ON users.id=comments.user_id "
                ."WHERE post_id=$post_id";
         
                    
         $result = mysqli_query($conn, $sql);
         
        ?>
                    
        <?php while($comment = mysqli_fetch_assoc($result)): ?>
                   
                    <div class="comment">
                        <div class="row">
                            <div class="col-xs-3">
                                <p><?php echo $comment['first_name'].' '.$comment['last_name'] ?> </p>
                                <p><small><?php echo date('d/m/Y H:i\h', strtotime($comment['created_at'])) ?></small></p>
                            </div>
                            <div class="col-xs-9">
                                <p><?php echo htmlspecialchars($comment['text'], ENT_QUOTES, 'UTF-8') ?></p>
                                
                                 <?php if($user['admin']==1 || $user['id'] == $comment['user_id'] ): ?>
                                <a href="actions/delete.php?comment_id=<?php echo $comment['id']?>&post_id=<?php echo $post['id']?>" class="btn btn-danger pull-right"> <i class="fa fa-trash"></i></a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
        <?php endwhile ?>
                </div>
            </div>
        </div>
    </article>

    <hr>

    <?php require('parts/footer.php') ?>

</body>

</html>

