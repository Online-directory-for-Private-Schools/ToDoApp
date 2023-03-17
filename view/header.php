<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo LANG_APP_NAME;?></title>
    <link href="static/css/mysite.css" rel="stylesheet">
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>    

</head>
<body >
  <div class="container p-10 text-right">
  <div class="d-flex justify-content-between">

<form method="get" class="p-4">
  <select name="lang" onchange="this.form.submit()" id="lang" >
    <option default value="en"><?php echo LANG_CHOOSE?></option>
    <option value="en">English</option>
    <option value="fr">Français</option>
  </select>
</form>

<div class="align-items-center <?php echo ($user == null ? "d-none" : "d-flex")  ?>">
  <button type="submit" class="btn btn-primary " onclick="logout()"><?php echo LANG_LOGOUT ?></button>
</div>


</div>
