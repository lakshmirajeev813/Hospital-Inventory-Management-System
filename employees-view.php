<?php 
include 'common.php';
?>
<!DOCTYPE html>
<html>
<head>
<script src="dropdown.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="nav2.css">


<body>
	<center>
	<div class="head">
	<h2> EMPLOYEES LIST</h2>
	</div>
	</center>
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Employee ID</th>
			<th>Employee Name</th>
			<th>Position</th>
			<th>Phone No</th>
			<th>Address</th>
			<th>Action</th>
</tr>
	<?php
	include "config.php";
	$sql = "SELECT EMP_ID,E_NAME,E_POS,E_PHONE,E_ADDRESS FROM employees";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

	echo "<tr>";
		echo "<td>" . $row["EMP_ID"]. "</td>";
		echo "<td>" . $row["E_NAME"] . "</td>";
		echo "<td>" . $row["E_POS"]. "</td>";
		echo "<td>" . $row["E_PHONE"]. "</td>";
		echo "<td>" . $row["E_ADDRESS"]. "</td>";
		echo "<td align=center>";
		echo "<a class='button1 edit-btn' href=employees-update.php?id=".$row['EMP_ID'].">Edit</a>";
		echo "<a class='button1 del-btn' href=employees-delete.php?id=".$row['EMP_ID'].">Delete</a>";
		echo "</td>";
	echo "</tr>";
	}
	echo "</table>";
	} 

	$conn->close();
	
	?>
</body>
</html>
<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
for (var i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>