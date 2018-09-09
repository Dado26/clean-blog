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
                    if( isset($_GET['validation_error']) ){
                        if($_GET['validation_error'] == 1){
                            echo '<div class="text-danger">Please fill out all fields</div><br>';
                        }
                        if($_GET['validation_error'] == 2){
                            echo '<div class="text-danger">Password must have at least 6 characters</div><br>';
                        }
                    }
                ?>

                <form action="actions/register_user.php" method="post">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
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
                            <a href="login.php" class="pull-left" style="margin-top:20px"><small>Already have an account?</small></a>
                            <br>
                            <button type="submit" class="btn btn-default pull-right">Register</button>
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

