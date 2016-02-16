<div class="row">
	 <table id="data-table-simple" class="responsive-table display" cellspacing="0">
		<thead>
		  <tr>
		    <th>Sr No.</th>	
		    <th>Child Name</th>		   
		    <th>Meeting Date</th>
		    <th>Meeting Time</th>
		    <th>Status</th>		    	   
		  </tr>
		</thead>
		<tbody>
		  <?php
		  	$i = 1;
		  	if($meeting)
			  	foreach ($meeting as $key => $value) {		
			  		$status = "Pending";
			  		if($value['is_approved'] == 1)
			  			$status = "Approved";
			  		if($value['is_approved'] == -1)
			  			$status = "Rejected";

			  		echo '<tr>';
			  		echo '<td>'.$i.'</td>'; $i++;
			  		echo '<td>'.$value['child_name'].'</td>';
			  		echo '<td>'.$value['meeting_date'].'</td>';
			  		echo '<td>'.$value['meeting_time'].':00'.'</td>';
			  		echo '<td>'.$status.'</td>';		  		
			  		echo '</tr>';
			  	}
		  ?>
		</tbody>
	</table>
</div>