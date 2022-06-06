<?php
include_once 'header.php';
?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $_SESSION['name'];?></span><span class="text-black-50"><?php echo $_SESSION['email'];?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <p class="fw-bold"><?php echo "Role: " . $_SESSION['role'] ?></p>
                <form action="includes/changeuser.inc.php" method="post">
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" name="id" contenteditable="false" class="form-control" placeholder="enter email" value=<?php echo $_SESSION['userid']; ?>></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" name="email" contenteditable="false" class="form-control" placeholder="enter email" value=<?php echo $_SESSION['email']; ?>></div>
                    <div class="col-md-12"><label class="labels">Username</label><input type="text" name="username" class="form-control" placeholder="enter username" value=<?php echo $_SESSION['name']; ?>></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="submit" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET["errornone"])){
}
include_once 'footer.php';
?>
