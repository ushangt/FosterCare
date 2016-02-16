<div class="row">
	 <table id="data-table-simple" class="responsive-table display" cellspacing="0">
		<thead>
		  <tr>
		    <th>Sr No.</th>	
		    <th>Parent Name</th>
		    <th>Parent Email</th>
		    <th>Contact Number</th>
		    <th>Type</th>
		    <th>View</th>		       
		  </tr>
		</thead>
		<tbody>
		  <?php
		  	$i = 1;
		  	if($parents)
			  	foreach ($parents as $key => $value) {	

			  		$type = "";
			  		$string = "";
			  		if($value['role_id'] == 2){
			  			$string = "";
			  			$type = "Bilogical Parent/Guardian";
			  		}			  			
		  			if($value['role_id'] == 3){
		  				$string = ' <a href="view_finanicals?parent_id='.$value['id'].'" class="btn pink waves-effect waves-light"> View Financials </a>';
		  				$type = "Adopting Parent"; 	
		  			}
		  					  				
			  		echo '<tr>';
			  		echo '<td>'.$i.'</td>'; $i++;
			  		echo '<td>'.$value['name'].'</td>';
			  		echo '<td>'.$value['email'].'</td>';
			  		echo '<td>'.$value['contact_number'].'</td>';
			  		echo '<td>'.$type.'</td>';		  		
			  		echo '<td>'.$string.'</td>';
			  		echo '</tr>';
			  	}
		  ?>
		</tbody>
	</table>
</div>