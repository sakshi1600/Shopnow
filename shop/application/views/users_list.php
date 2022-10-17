	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Users List</title>
	</head>
	<body>
		
		<table>
			<tr>
				<th>Name</th>
				<th>City</th>
			</tr>
			<?php foreach($users as $user){?>
			<tr>
				<td><?= $user['name']?></td>
				<td><?= $user['city']?></td>
				
			</tr>
		<?php }
		?>
		</table>
	
	</body>
	</html>