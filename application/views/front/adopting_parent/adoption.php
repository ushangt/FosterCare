<div class="row">
	 <table id="data-table-simple" class="responsive-table display" cellspacing="0">
		<thead>
		  <tr>
		    <th>Sr No.</th>	
		    <th>Child Name</th>
		    <th>Image</th>
		    <th>Age</th>
		    <th>Sex</th>		    	   	
		    <th>Action</th>	    
		  </tr>
		</thead>
		<tbody>
		  <?php
		  	$i = 1;
		  	if($adoption)
			  	foreach ($adoption as $key => $value) {	
			  				
			  		echo '<tr>';
			  		echo '<td>'.$i.'</td>'; $i++;
			  		echo '<td>'.$value['name'].'</td>';
			  		echo '<td> <img src="'.base_url().'uploads/'.$value['image'].'" width="50" height="50"> </td>';
			  		echo '<td>'.$value['age'].'</td>';
			  		echo '<td>'.$value['sex'].'</td>';			  			  			  				  		
			  		echo '<td> <a href="action_adopt?child_id='.$value['id'].'" class="btn pink waves-effect waves-light"> Adopt </a>';
			  		echo '</tr>';
			  	}
		  ?>
		</tbody>
	</table>
</div>