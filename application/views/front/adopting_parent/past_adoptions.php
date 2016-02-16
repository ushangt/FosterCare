<div class="row">
	 <table id="data-table-simple" class="responsive-table display" cellspacing="0">
		<thead>
		  <tr>
		    <th>Sr No.</th>	
		    <th>Child Name</th>
		    <th>Image</th>	    	   	
		    <th>Status</th>	    
		  </tr>
		</thead>
		<tbody>
		  <?php
		  	$i = 1;
		  	if($adoption)
			  	foreach ($adoption as $key => $value) {	
			  		$status = "Not legally verified";
			  		if($value['is_legally_verified'] == 1)	
			  			$status = "Legally Verified";		
			  		echo '<tr>';
			  		echo '<td>'.$i.'</td>'; $i++;
			  		echo '<td>'.$value['child_name'].'</td>';
			  		echo '<td> <img src="'.base_url().'uploads/'.$value['image'].'" width="50" height="50"> </td>';		  				  			  			  				  	
			  		echo '<td>'.$status.'</td>';
			  		echo '</tr>';
			  	}
		  ?>
		</tbody>
	</table>
</div>