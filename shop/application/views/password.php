
   <?php include('include/header.php');
   ?>


      <style>
         .btn {
         margin-top: 20px;
         font-family: "Times New Roman", Times, serif;
         }
         .card {
         margin-top: 20px;
         /*background-color: #DCDCDC;*/
         }
         .p1 {
         font-family: "Times New Roman", Times, serif;
         margin-top: 5px;
         }
         .p2{
         width: 100%;
         }
         input, textarea,h3,select,option{
         font-family: "Times New Roman", Times, serif;
         }
      </style>
  
   <body>
      <?php include('include/sidebar.php');
         ?>
      <div style="margin-left:25%">
      <div class="w3-container w3-teal">
         <h1>My Page</h1>
      </div>
      <!-- <img src="img_car.jpg" alt="Car" style="width:100%"> -->
      <center>
         <h3> Add Details</h3>
      </center>

      <div class="container">
                 <button type="button" value="Go back!" onclick="history.back()">BACK</button>
      <div class="card" >
         <div class="card-header" style="font-family: Times New Roman, Times, serif;">
            <h4>Add Family Head</h4>
         </div>
         <div class="card-body">
            <form  name="myForm" onsubmit="return validateForm()"  action="<?= base_url('PasswordController/update')?>"  method="POST" enctype="multipart/form-data" >
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
             
               <div class="row">
                  <div class="col-md-6 ">
                     <label for="password" class="p1" >Old Password</label><br>
                     <input type="password" id="password" name="o_password"  placeholder="Old Password"  class="p2"  required>
                  </div>
                  <div class="col-md-6 ">
                     <label for="password" class="p1" >New Password:</label><br>
                     <input type="password" id="password" name="n_password"  placeholder="New Password" class="p2"  >
                  </div>
                    <div class="col-md-6 ">
                     <label for="password" class="p1" >Confirm Password:</label><br>
                     <input type="password" id="password" name="c_password"  placeholder="Confirm Password" class="p2"  >
                  </div>
                 
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <button type="submit" class="btn btn-outline-success add_button" name="update" value="submit" >Update</button>
                     </div>
                  </div>
                 
            </form>
            </div>
         </div>
      </div>
   </body>
</html>
<?php include('include/footer.php');
   ?>

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
