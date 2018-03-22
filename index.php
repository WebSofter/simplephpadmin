<?php
session_start();
require_once "./config.php";
//echo $_SESSION['email'];
if (isset($_SESSION['email'])) $isEnter = true;
else $isEnter = false;

$sql = "SELECT * FROM info";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Административная панель</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h1 class="text-center">Административная панель</h1>
    <div class="container-fluid">
		<form>
		  <?php if($isEnter){?>
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" value="<?php echo $row["email"];?>" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
		    <small id="emailHelp" class="form-text text-muted">Email администратора.</small>
		  </div>
		  <div class="form-group">
		    <label for="password">Пароль</label>
		    <input type="text" value="<?php echo $row["password"];?>" class="form-control" id="password" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="info">Информация</label>
		    <textarea class="form-control" id="info" rows="3">
		    	<?php echo $row["info"];?>
		    </textarea>
		  </div>
		  <div class="form-group">
		    <label for="file">Баннер</label>
		    <input disabled="true" type="text" value="<?php echo $row["banner"];?>" class="form-control" id="banner" placeholder="Выберите активный баннер">
		    <br/>
		    <input type="file" class="form-control-file" id="file" aria-describedby="fileHelp">
		    <small id="fileHelp" class="form-text text-muted">Загрузите новый баннер или установите из существующего списка.</small>
		  </div>
		  <div class="form-group" id="photo-content">
          <?php 
          $fullPath = "./uploads";
          $files = scandir($fullPath);
          foreach($files as $file) {
          	if($file=="."||$file=="..") continue;
          ?>
		  	<div class="banner-item <?php if($row["banner"]==$file) echo "active-banner"?>">
		  		<span class="banner-rem-btn" data-filename="<?php echo $file?>">x</span>
		  		<div>
		  			<img src="<?php echo "./uploads/".$file?>"/>
		  		</div>
		  	</div>
		  <?php }?>
		  </div>
		  <div class="form-group">
		  	<button type="submit" class="btn btn-primary btn-save">Сохранить</button>
		  	&nbsp;
		  	<button type="submit" class="btn btn-secondary btn-exit">Выйти</button>
		  </div>
		  <?php }else{?>
		  <div class="form-group">
		    <label for="enterEmail">Email</label>
		    <input type="email" class="form-control" id="enterEmail" aria-describedby="emailHelp" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="enterPassword">Пароль</label>
		    <input type="text" class="form-control" id="enterPassword" placeholder="Password">
		  </div>
		  <div class="form-group">
		  	<button type="submit" class="btn btn-primary btn-enter">Войти</button>
		  </div>
		  <?php } ?>
		</form>
    </div>
  </body>
</html>