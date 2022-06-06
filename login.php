<?php
include_once 'header.php';
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>log</title>
    </head>
    <body>
    <section class="vh-100 bg-image" style="background-color: rgb(22, 22, 22);">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px; background-color: rgb(12, 12, 12);">
                            <div class="card-body p-5">
                                <h2 class=" text-light text-center mb-5">Log In</h2>

                                <form class="text-light" action="includes/login.inc.php" method="post">

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                        <input type="email" name="email" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                        <input type="password" name="pwd" class="form-control form-control-lg" />
                                    </div>


                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="submit" style="width: 150px"
                                                class="btn btn-block btn-lg text-white">Login</button>
                                    </div>

                                    <p class="text-center  mt-5 mb-0"><a href="signup.php" style="color: #9BFF4D" class="text-decoration-none fw-bold"><u>Sign up here</u></a></p>
                                    <?php
                                    if(isset($_GET["error"])){
                                        if($_GET["error"] == "emptyinput"){
                                            echo "<p class='d-flex text-danger fw-bold mt-3 justify-content-center'>Fill in all fields!</p>";
                                        }
                                        else if ($_GET["error"] == "wronglogin"){
                                            echo "<p class='d-flex text-danger fw-bold mt-3 justify-content-center'>Wrong password or email!</p>";
                                        }
                                    }
                                    ?>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
    </html>