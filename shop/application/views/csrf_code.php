   <!-- <?php
            //$attributes = array( 'id'=>'form1', 'name'=>'myForm', 'onsubmit'=>'return validateForm()', 'enctype'=>'multipart/form-data');
            //echo form_open('HeadController/savedata', $attributes);  
            ?> -->





             <form  name="myForm" id="form1" onsubmit="return validateForm()"  action="<?= base_url('HeadController/savedata')?>"  method="POST" enctype="multipart/form-data" >

         
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">




          <?php
          $csrf = array(
    'name' => $this->security->get_csrf_token_name(),
    'hash' => $this->security->get_csrf_hash()
    );?>
          <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />


<script>
  $("#form1").submit(function(e) {
        console.log('ok');
    e.preventDefault(); // prevent actual form submit
    var form = $(this);
    var url = form.attr('action'); //get submit url [replace url here if desired]
    $.ajax({
         type: "POST",
         url: url,
        // data: form.serialize(), // serializes form input
         data :{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',"fname":fnam}, 
         success: function(data){
             console.log(data);
         }
    });
});
</script>
          *************************Head.php***************************
          

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
         <h3> Add Family Head Details</h3>
      </center>

      <div class="container">
                 <button type="button" value="Go back!" onclick="history.back()">BACK</button>


                 
                
      <div class="card" >
         <div class="card-header" style="font-family: Times New Roman, Times, serif;">
            <h4>Add Family Head</h4>
         </div>
         <div class="card-body">
           <form  name="myForm" id="form1" onsubmit="return validateForm()"  action="<?= base_url('HeadController/savedata')?>"  method="POST" enctype="multipart/form-data" >

         
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

          
               <div class="row">
                  <div class="col-md-6 ">
                     <label for="fname" class="p1" >First name:</label><br>
                     <input type="text" id="fname" name="fname"  placeholder="First Name"  class="p2"  onkeydown="return /[a-z]/i.test(event.key)" required>
                  
                  </div>
                  
                  <div class="col-md-6 ">
                     <label for="lname" class="p1" >Last name:</label><br>
                     <input type="text" id="lname" name="lname"  placeholder="Last Name" class="p2" onkeydown="return /[a-z]/i.test(event.key)"  >
                     
                  </div>
                  <div class="col-md-6 ">
                     <label class="p1" >Birthdate:</label>
                     <br>
                     <input class="p2" type="date" id="birthdate" name="date"  placeholder="Above 21 allowed only  "required>
                    
                  </div>
                  <div class="col-md-6">
                     <label class="p1">Mobile Number:</label>
                     <br>
                     <input type="text" placeholder="Enter Contact Number"  name="mob_no" id="mob_no" class="p2"  pattern="[6789][0-9]{9}" title="Please enter valid phone number" maxlength="10" required>
                    
                  </div>
                  <div class="col-md-6">
                     <label class="p1">Select Image:</label><br>
                     <input type="file" name="profile_image"  required/>
                        
                  </div>
                 <div class="col-md-6">
                     <p class="p1">Gender</p>
                     <input type="radio" id="html" name="gender" value="Male">
                     <label for="Male"class="p1">Male</label>
                     <input type="radio" id="Female" name="gender" value="Female">
                     <label for="Female"class="p1 ">Female</label>
                     <input type="radio" id="javascript" name="gender" value="Other">
                     <label for="Other"class="p1">Other</label>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="p1">Marital status</label><br>
                        <select id='purpose' class="p2" name="status" required>
                           <option value="">Select Status</option>
                           <option value="0">Un-married</option>
                           <option value="1">Married</option>
                        </select>
                     </div>
                  </div>
                  <div style='display:none;' id='business' class="p2">Marriage Date
                     <br/>&nbsp;
                     <br/>&nbsp;
                     <input type='date' class='p1' name='w_date' />
                     <br/>
                  </div>
                  <div class="col-md-6">
                     <label class="p1">Address:</label><br>
                     <textarea type="text" placeholder="Enter Address" name="address" id="address" class="p2" required></textarea> 
                    
                  </div>
                  <div class="col-md-6">
                     <label class="p1">Pincode:</label><br>
                      <input type="text" id="zip" placeholder="Enter pin" name="pin"  class="p2" minlength="6" maxlength="6" size="6" regex = "^[1-9]{1}[0-9]{2}\\s{0, 1}[0-9]{3}$" required>
                     
                  </div>
                   <div class="col-md-6">
                    <div class="form-group">
                <label for="title">Please Select State:</label>
                <select name="state" class="form-control" required>
                    <option value="">--- Select State ---</option>
                    <?php
                        foreach ($state as $key) {
                            echo "<option value='".$key->id."'>".$key->state."</option>";
                        }
                    ?>
                </select>
            </div>
         </div>
<!-- Devloped by Pakainfo.com free download examples -->
 <div class="col-md-6">
            <div class="form-group">
                <label for="title">Select Your City:</label>
                <select name="city" class="form-control" required>
                  <option value="">---Select City---</option>
                </select>
            </div>
         </div>
                  
                  <div class="col-md-6 ">
                   
                        <label for="hobbies" class="p1 p2" >Hobbies:</label><br>
                          <div id="tab_logic" class="after-add-more">
                        <input type="text" id="hobbies" name="hobbies[]"  placeholder="hobbies"  class="p2" onkeydown="return /[a-z]/i.test(event.key)" required>
                        
                     </div>
                      <div class="more-feilds"></div>
                     <div class="col-md-6">
                        <div class="form-group change">
                           <label for="">&nbsp;</label><br/>
                           <a class="btn btn-success add-more">+ Add More</a>
                        </div>
                     </div>

                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <button type="submit" class="btn btn-outline-success add_button" name="submit" value="submit" >Submit</button>
                     </div>
                  </div>
              </div>
              <?php echo form_close()?>

            </div>
         </div>
      </div>
</div>

   </body>


<?php include('include/footer.php');
   ?>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- *****************ADD MORE HOBBIES*********************** -->
<script>
 

$(document).ready(function() {
    $(".add-more").click(function(){ 
        var html = $("#tab_logic").html();
        $(".more-feilds").append(html);        
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents("#tab_logic").remove();
    });
});
</script>


<!-- *****************ADD MORE HOBBIES END*********************** -->


<!-- **************************************FORM VALIDATION********************** -->
<script>


function validateForm() {
  let x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }

  let y = document.forms["myForm"]["lname"].value;
  if (y == "") {
    alert("Last Name must be filled out");
    return false;
  }

  let z = document.forms["myForm"]["date"].value;
  if (z == "") {
    alert("date must be filled out");
    return false;
  }
  let p = document.forms["myForm"]["mob_no"].value;
  if (p == "") {
    alert("mob_no must be filled out");
    return false;
  }
  
   let q = document.forms["myForm"]["file"].value;
  if (q == "") {
    alert("file must be filled out");
    return false;
  }
let r= document.forms["myForm"]["gender"].value;
  if (r == "") {
    alert("gender must be filled out");
    return false;
  }
  let s= document.forms["myForm"]["status"].value;
  if (s == "") {
    alert("status must be filled out");
    return false;
  }
  let t= document.forms["myForm"]["address"].value;
  if (t == "") {
    alert("address must be filled out");
    return false;
  }
   let u= document.forms["myForm"]["pin"].value;
  if (u == "") {
    alert("pin must be filled out");
    return false;
  }
  let E= document.forms["myForm"]["state_id"].value;
  if (E== "") {
    alert("State Name must be filled out");
    return false;
  }
    let F= document.forms["myForm"]["city_id"].value;
  if (F== "") {
    alert("City Name must be filled out");
    return false;
  }
 
}

</script>
<!-- *********************FORM VALIDATION END ********************* -->

<!-- ************************BIRTHDATE*************************** -->
<script type="text/javascript">
   $("#birthdate").on("change",function(){
        var birthdate_selected = $(this).val();
        
       var today = new Date();
       var birthDate = new Date(birthdate_selected);
       
       var age = today.getFullYear() - birthDate.getFullYear();
       var m = today.getMonth() - birthDate.getMonth();
       if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
           age--;
       }
        if(age >= 21)
        {
         

        }
        else
        {
          swal("Your age should be 21 Years!","","error")
          .then((value) => {
                     if(value)
                     {
                     window.location.reload();
 
                     }
                     else
                     {
                       //window.location.reload();
                     }
                });
         }

       });
</script>
<!-- **************************BIRTHDATE END*************************** -->

<script type="text/javascript">

   inputField.addEventListener('input', function () 
   {
  if ((inputField.value/inputField.value) !== 1) {
    console.log("Please enter a number");
  }
});
</script>


<!-- *****************Dependent State And City********************** -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('select[name="state"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '../Head/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ value.id +'">'+ value.city +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
</script>

<script>
$('#form1').submit(function() {
    if (
        $('input:radio', this).is(':checked')) {
        // everything's fine...
    } else {
        alert('Please select Gender!');
        return false;
    }
});


</script>
