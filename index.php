<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>todo list</title>
  </head>
  <body>
		<!-- End of New Todo -->
		<main class="section">
			<nav>
				
				<div id="mySidenav" class="sidenav">
					<a id="closeBtn" href="#" class="close">×</a>
					<ul class="menu_burger">
						<div>
							<li><a href="#">Business</a></li>
							<li><a href="#">Personal</a></li>
						</div>
					  
					  <div class="sub-burger">
						<li><a href="#">Témoignages</a></li>
					  	<li><a href="#">Contact us </a></li>
					  </div>
					  
					</ul>
				  </div>
				  
				  <a href="#" id="openBtn">
					<span class="burger-icon">
					  <span></span>
					  <span></span>
					  <span></span>
					</span>
				  </a>
			
			</nav>
		
    <article class="app">
		<section class="create-todo">
			
			<form id="new-todo-form" method="POST" action="queries SQL/add_query.php">
				<input 
					type="text" 
					placeholder="add new task 🙂"
					id="content"
					class="input_value_task" 
					name="task" required/>
				
					<legend> Pick a category </legend>
				<div class="options">
					<label>
						<input type="radio" name="category" id="category1" value="business" checked/> 
						<span class="bubble business"></span>
						<div>Business</div>
					</label>
					<label>
						<input type="radio" name="category" id="category2" value="personal" />
						<span class="bubble personal"></span>
						<div>Personal</div>
					</label>
				</div>

				<input type="submit" value="Add todo" class="submit_new_todo" name="add"/>
			</form>
		</section>
		<!-- End of New Todo -->

		<!-- Todo List -->
		<table class="table">
			<thead>
				<tr>
					<th>N °</th>
					<th>Task</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

			
				<?php

					require 'queries SQL/conn.php';
					$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
					$count = 1;
					while($fetch = $query->fetch_array()){
						var_dump($fetch);
				?>
				<tr>
					<td><?php echo $count++?></td>
					<td><?php echo $fetch['task']?></td>
					<td><?php echo $fetch['status']?></td>
					<td colspan="2">
							<?php
								if($fetch['status'] != "Done"){
									echo 
									'<a href="queries SQL/update_task.php?task_id='.$fetch['task_id'].'" class="btn btn-success"><span class="glyphicon glyphicon-check">DONE</span></a> |';
								} else {
									echo 
									'<a href="queries SQL/DELET_task.php?task_id='.$fetch['task_id'].'" class="btn btn-success"><span class="glyphic on glyphicon-check">NOT DONE</span></a> |';
								}
							?>
							 <a href="queries SQL/delete_query.php?task_id=<?php echo $fetch['task_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"><img src="img/11-111133_delete-trash-icon-waste-removebg-preview.png" alt="" width= "60px"></span></a>
						
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		<!-- End of Todo List -->

	</article>
</main>

<script src="js/index.js"></script>
  </body>
</html>
