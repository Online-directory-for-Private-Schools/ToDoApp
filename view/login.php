
<?php 

$isError = isset($vars["error"]);

$error = "";

if($isError){
  $error = $vars["error"];
}

?>

  <div class="row justify-content-center align-items-center main-row text-left">
    <div class="col shadow main-col bg-white">
      <div class="row bg-primary text-white">
        <div class="col  p-2">
          <h4><?php echo LANG_APP_NAME;?></h4>

        </div>
      </div>

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
  <button type="button" class="btn btn-secondary" onclick="redirect()"><?php echo LANG_SIGNUP ?></button>
</form>

