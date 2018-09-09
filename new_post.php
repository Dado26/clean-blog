<?php require('parts/globals.php');

if( $user['admin']!=1){
    header('location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<?php require('parts/header.php') ?>

<body>

    <?php require('parts/navigation.php') ?>

    <?php require('parts/header_image.php') ?>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <form action="actions/create_post.php" method="post">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" required>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Body</label>
                            <textarea name="content" class="form-control" placeholder="Body" style="height:300px"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <br>
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>

    <?php require('parts/footer.php') ?>

</body>

</html>

