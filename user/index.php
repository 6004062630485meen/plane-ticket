<!DOCTYPE html>
<html>
<head>
  <title>AirAsia.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="cssLogin.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  position: relative;
  overflow: hidden;
  background-color: #333;
  height: 8%;
}

.topnav a {
  float: left;
  color: #818181;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav-centered a {
  float: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Responsive navigation menu (for mobile devices) */
@media screen and (max-width: 600px) {
  .topnav a, .topnav-right {
    float: none;
    display: block;
  }
  
  .topnav-centered a {
    position: relative;
    top: 0;
    left: 0;
    transform: none;
  }
}
</style>

</head>
<body>
  <div class="topnav">
    <!-- Centered link -->
    <div class="topnav-centered">
      <a href="#home"><img src="1024px-AirAsia_New_Logo.png" alt="logo" style="width:55px;"></a>
    </div>
  </div>
  
</div>

  <div class="bg-img">
    <div class="container">
      <button  class="tablink" onclick="openPage('Login', this, 'red')" id="defaultOpen">เข้าสู่ระบบ</button>
      <button class="tablink" onclick="openPage('Account', this, 'red')">สมัครสมาชิก</button>
      
      <!-- Login tab -->
      <div id="Login" class="tabcontent">
        <div class="loginForm">
          <form name="login" method="post" action="checklogin.php">
            
            <div class="bgBox">
              <h2></h2>
              <div class="inputRow">
                <input type="text" name="email" id="email" placeholder="Enter your email" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>" required>
              </div>
              <div class="inputRow">
                <input type="password" name="pwd" id="pwd" placeholder="Enter your password" value="<?php if(isset($_COOKIE['pwd'])) echo $_COOKIE['pwd']; ?>" required>
              </div>
              <div class="inputRow submit">
                <input type="submit" value="Login" class="signIn" id="sign_in">
              </div>
              <div class="inputRow">
                <label style="color: black;"><input type="checkbox" name="remember" <?php if(isset($_COOKIE['email'])){echo "checked='checked'";}?> value="1" style="width:6%;"> Remember me</label>
              </div>
              
            </div>

          </form>
        </div>
      </div>

      
      <!-- Account tab -->
      <div id="Account" class="tabcontent">
        <div class="loginForm">
          <form name="login" method="post" action="inputdataAccount.php">
            
            <div class="bgBox">
              <h2></h2>
              <div class="inputRow">
                <input type="text" name="Name_m" id="Name_m" placeholder="ชื่อ" value="">
              </div>
              <div class="inputRow">
                <input type="text" name="Surname_m" id="Surname_m" value="" placeholder="นามสกุล">
              </div>
              <div class="inputRow">
                <input type="text" name="email" id="email" placeholder="email" value="" autofocus>
              </div>
              <div class="inputRow">
                <input type="password" name="password" id="password" value="" placeholder="password">
              </div>
              <div class="inputRow submit">
                <input type="submit" value="Submit" class="signIn" id="sign_in">
              </div>
            </div>

          </form>
        </div>
      </div>


      <script type="text/javascript" src="jsLogin.js"></script>
    </div>

  </div>

</body>
</html>