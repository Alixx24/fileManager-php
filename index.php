
<?php
require "autoload.php";
use Models\AuthUser;

  if(isset($_POST['register_btn']) && $_SERVER['REQUEST_METHOD'] === 'POST')
  {
    // $csrf_token = $_POST['csrf_token'];
    $csrf_token = '11111111111';

    $data = $_POST['frm'];

    $authUser = new AuthUser();
    $authUser->register($csrf_token , $data);

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php require_once 'public/layouts.php' ?>

<body>
  <form>

    <div class="form-group">
      <div class="login">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
    </div>



    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <div class="form-group">
    <h2>Register</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="register" method="post">
      <input type="hidden" name="csrf_token" value="">
      <input name="frm['email]" type="text" class="form-control" placeholder="email">

      <input name="frm['password']" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      <input name="frm['confirm_password']" type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
      <input name="register_btn" class="btn btn-primary" type="submit" value="register">
    </form>
  </div>

</body>

</html>