<div class="row">
	 <table id="data-table-simple" class="responsive-table display" cellspacing="0">
		<thead>
		  <tr>
		    <th>Sr No.</th>	
		    <th>Child Name</th>
		    <th>Image</th>
		    <th>Age</th>
		    <th>Sex</th>
		    <th>Race</th>
		    <th>Medical Condition</th>
		    <th>Adopted</th>	
		    <th>Action</th>	    
		  </tr>
		</thead>
		<tbody>
		  <?php
		  	$i = 1;
		  	foreach ($children as $key => $value) {	

		  		$adopted = "No";
		  		if($value['adopted'] == 1)
		  			$adopted	 = "Yes"; 		  				
		  		echo '<tr>';
		  		echo '<td>'.$i.'</td>'; $i++;
		  		echo '<td>'.$value['child_name'].'</td>';
		  		echo '<td> <img src="'.base_url().'uploads/'.$value['image'].'" width="50" height="50"> </td>';
		  		echo '<td>'.$value['age'].'</td>';
		  		echo '<td>'.$value['sex'].'</td>';
		  		echo '<td>'.$value['race'].'</td>';
		  		echo '<td>'.$value['medical_condition'].'</td>';		  		
		  		echo '<td>'.$adopted.'</td>';
		  		echo '<td> <a href="edit_child?child_id='.$value['id'].'" class="btn pink waves-effect waves-light"> Edit </a>';
		  		echo '</tr>';
		  	}
		  ?>
		</tbody>
	</table>
</div>