<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  body,
  html {
    height: 100%;
    font-family: Arial, Helvetica, sans-serif;
  }
  
  * {
    box-sizing: border-box;
  }
  
  .bg-img {
    /* The image used */
    background-image: url("images/it2.jpg");
    min-height: 100%;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
  }
  /* Add styles to the form container */
  
  .container {
    position: absolute;
    right: 0;
    margin: 200px;
    margin-top: 50px;
    max-width: 600px;
    padding: 40px;
    background-color: white;
  }
  /* Full-width input fields */
  
  input[type=text],
  input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }
  
  input[type=text]:focus,
  input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }
  /* Set a style for the submit button */
  
  .btn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }
  
  .btn:hover {
    opacity: 1;
  }
  </style>
</head>

<body>
  <div class="bg-img">
  
       <form  method="POST" class="container" action="<?= base_url('LoginController/insertdata')?>"   enctype="multipart/form-data" > 
         
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <h2><i class="fa fa-user icon" style=" width:100%; align-content: absolute;" >USER
LOGIN</i></h2>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <button type="submit" class="btn">Login</button>
    </form>
  </div>
</body>

</html>