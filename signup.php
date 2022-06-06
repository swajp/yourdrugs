<?php
include_once 'header.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>reg</title>
    </head>
    <body>
    <section class="vh-100 bg-image" style="background-color: rgb(22, 22, 22);">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px; background-color: rgb(12, 12, 12);">
                            <div class="card-body p-5">
                                <h2 class="text-center mb-5 text-light">Sign up</h2>

                                <form class="text-light" action="includes/signup.inc.php" method="post">

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Username</label>
                                        <input type="text" name="name" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                        <input type="email" name="email" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                        <input type="password" name="pwd" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Password again</label>
                                        <input type="password" name="pwdrepeat" class="form-control form-control-lg" />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="submit" style="width: 150px"
                                                class="btn btn-block btn-lg text-white"> Sign up</button>
                                    </div>


                                    <p class="text-center mt-5 mb-0"><a href="login.php" class="text-decoration-none fw-bold" style="color: #9BFF4D"><u>Log in here</u></a></p>
                                    <?php
                                    if(isset($_GET["error"])){
                                        if($_GET["error"] == "emptyinput"){
                                            echo "<p class='d-flex text-danger fw-bold mt-3 justify-content-center'>Fill in all fields!</p>";
                                        }
                                        else if ($_GET["error"] == "invalidemail"){
                                            echo "<p class='d-flex text-danger fw-bold mt-3 justify-content-center'>Choose a proper email!</p>";
                                        }
                                        else if ($_GET["error"] == "passwordsdontmatch"){
                                            echo "<p class='d-flex text-danger fw-bold mt-3 justify-content-center'>Passwords doesnt match!</p>";
                                        }
                                        else if ($_GET["error"] == "stmtfailed"){
                                            echo "<p class='d-flex text-danger fw-bold mt-3 justify-content-center'>Something went wrong!</p>";
                                        }
                                        else if ($_GET["error"] == "emailtaken"){
                                            echo "<p class='d-flex text-danger fw-bold mt-3 justify-content-center'>Email already taken!</p>";
                                        }
                                        else if ($_GET["error"] == "none"){
                                            echo "<p class='d-flex text-success fw-bold mt-3 justify-content-center'>You have signed up!</p>";
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
