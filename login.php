<?php require('parts/globals.php') ?>
<!DOCTYPE html>
<html lang="en">

<?php require('parts/header.php') ?>

<body>

    <?php require('parts/navigation.php') ?>

    <?php require('parts/header_image.php') ?>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-10 col-md-offset-1">

                <?php
                    if( isset($_GET['success']) ){
                        echo '<div class="text-success">You have registered successfully!</div><br>';
                    }
                    
                    if( isset($_GET['invalid']) ){
                        echo '<div class="text-danger">Invalid email or password</div><br>';
                    }
                ?>

                <form action="actions/login_user.php" method="post">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <a href="register.php" class="pull-left" style="margin-top:20px"><small>Register here</small></a>
                            <br>
                            <button type="submit" class="btn btn-default pull-right">Login</button>
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

