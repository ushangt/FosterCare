<div class="row">
	 <table id="data-table-simple" class="responsive-table display" cellspacing="0">
		<thead>
		  <tr>
		    <th>Sr No.</th>	
		    <th>Child Name</th>	
		    <th>Parent/Guardian Name</th>	   		    
		    <th>Reason</th>	
		    <th>Action</th>	    
		  </tr>
		</thead>
		<tbody>
		  <?php
		  	$i = 1;
		  	if($requests)
			  	foreach ($requests as $key => $value) {	
			  				  				
			  		echo '<tr>';
			  		echo '<td>'.$i.'</td>'; $i++;
			  		echo '<td>'.$value['child_name'].'</td>';		  		
			  		echo '<td>'.$value['parent_name'].'</td>';
			  		echo '<td>'.$value['reason'].'</td>';		  		
			  		echo '<td> <a href="action_approve_donation?donation_id='.$value['id'].'" class="btn-floating btn-large waves-effect waves-light green accent-3"> <i class="mdi-action-done"></i>  </a>
			  				   <a href="action_reject_donation?donation_id='.$value['id'].'" class="btn-floating btn-large waves-effect waves-light red accent-3"> <i class="mdi-content-clear"></i> </a>';
			  		echo '</tr>';
			  	}
		  ?>
		</tbody>
	</table>
</div>