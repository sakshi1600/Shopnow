<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  /* Full-width input fields */
  
  input[type=text],
  input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }
  
  .bg-img {
    /* The image used */
    background-image: url("img_nature.jpg");
    min-height: 380px;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
  }
  
  input[type=text]:focus,
  input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }
  
  .input-container {
    display: -ms-flexbox;
    /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
  }
  
  .icon {
    padding: 20px;
    color: white;
    min-width: 0.5px;
    min-height: 0.5px;
    */ text-align: center;
  }
  /* Set a style for the submit button */
  
  .registerbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }
  
  .registerbtn:hover {
    opacity: 1;
  }
  
  .icon-bar {
    width: 100%;
    background-color: #555;
    overflow: auto;
  }
  
  .icon-bar a {
    float: left;
    width: 20%;
    text-align: center;
    padding: 12px 0;
    transition: all 0.3s ease;
    color: white;
    font-size: 36px;
  }
  
  .icon-bar a:hover {
    background-color: #000;
  }
  
  .active {
    background-color: #04AA6D;
  }
  </style>
</head>

<body>
 <form  method="POST" action="<?= base_url('RegisterController/insertdata')?>"   enctype="multipart/form-data" > 

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            
    <div class="container">
      <div class="icon-bar"> <a class="active" href="#"><i class="fa fa-home"></i></a> <a href="#"><i class="fa fa-search"></i></a> <a href="#"><i class="fa fa-envelope"></i></a> <a href="#"><i class="fa fa-globe"></i></a> <a href="#"><i class="fa fa-trash"></i></a> </div>
      <div class="card">
        <div class="card-body">
          <h1>Register</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
          <div class="row">
            <div class="col-sm-6">
              <label><b>Full Name</b></label>
              <br>
              <div class="input-container"> <i class="fa fa-user icon" style="color:grey;"></i>
                <input type="text" placeholder="Enter Name" name="name" id="name" required>
              </div>
            </div>
            <div class="col-sm-6">
              <label><b>Email</b></label>
              <br>
              <div class="input-container"> <i class="fa fa-envelope icon" style="color:grey;"></i>
                <input type="text" placeholder="Enter Email" name="email" id="email" required>
              </div>
            </div>
        
            <div class="col-sm-6">
              <label><b>Mobile Number</b></label>
              <br>
              <div class="input-container"> <i class="fa fa-mobile icon" style="color:grey;"></i>
                <input type="text"  pattern="[1-9]{1}[0-9]{9}" placeholder="Enter Contact Number" name="mob" id="mob" required>
              </div>
            </div>
            <div class="col-sm-6">
              <label><b>Password</b></label>
              <br>
              <div class="input-container"> <i class="fa fa-key icon" style="color:grey;"></i>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
              </div>
            </div>
            <div class="col-sm-6">
              <label><b>Repeat Password</b></label>
              <br>

              <div class="input-container"> <i class="fa fa-key icon" style="color:grey;"></i>
                <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw_repeat" required>
              </div>
            </div>
              <div class="col-sm-6">
                     <label>Select Image:</label><br>
                      <div class="input-container"> <i class="fa fa-file icon" style="color:grey;"></i>
                     <input type="file" name="profile_image"  required/>
                        
                  </div>
          </div>
        </div>
          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
          <button type="submit" class="registerbtn" name="submit" value="submit" >Register</button>
        </div>
        <div class="container signin">
          <p>Already have an account? <a href="#">Sign in</a>.</p>
        </div>
      </div>
    </div>
  <?php echo form_close()?>
</body>

</html>