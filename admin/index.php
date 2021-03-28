<!DOCTYPE html>
<html lang="en">
<head>
  <title>AirAsia|Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
.jumbotron {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
h4 {
  font-weight: bold;
}
</style>
</head>
<body>

  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="img-responsive logo" src="1024px-AirAsia_New_Logo.png" alt="" style="width:80px;"></a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-copyright-mark"></span> 2019 AirAsia Group Berhad</a></li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!--/.contatiner -->
    </div>
  </div>

  <div class="jumbotron">
    <div class="container">
      <h2>Login</h2>
      <form name="login" method="post" action="check_login.php">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" style="width:50%;" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>" required>
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password" style="width:50%;" value="<?php if(isset($_COOKIE['pwd'])) echo $_COOKIE['pwd']; ?>" required>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])){echo "checked='checked'"; } ?> value="1"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <br><br>
      <h4>การเข้าสู่ระบบ<small> admin</small></h4>
      <ol>
        <li>ป้อนเลขรหัสพนักงานในช่อง Username</li>
        <li>ป้อนรหัสผ่านประจำตัวลงในช่อง Password</li>
        <li>คลิกปุ่ม Submit เพื่อเข้าใช้งานระบบ</li>
      </ol>
    </div>
  </div>

</body>
</html>
