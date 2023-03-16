
<?php 

$isError = isset($vars["error"]);

$error = "";

if($isError){
  $error = $vars["error"];
}

?>

<form action="login.php" method="get" class="p-4">
  <div class="alert alert-danger <?php if(!$isError) {echo "invisible";} ?>" role="alert">
    <?php echo $error ?>
  </div>

  <div class="form-group">
  <input type="hidden" name="action" value="login" />
    <label for="exampleInputEmail1"><?php echo LANG_EMAIL_ADDRESS ?></label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><?php echo LANG_PASSWORD ?></label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary"><?php echo LANG_LOGIN ?></button>
</form>

