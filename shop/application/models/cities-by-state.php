<?php
require_once "../assets/constants/config.php";
$state_id = $_POST["state_id"];
$result = mysqli_query($conn,"SELECT * FROM city where state_id = $state_id");
?>
<option value="">Select City</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["city"];?></option>
<?php
}
?>