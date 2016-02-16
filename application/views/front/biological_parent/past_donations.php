<div class="row">
	 <table>
		<thead>
		  <tr>
		    <th>Sr No.</th>
		    <th>Child Name</th>
		    <th>Reason</th>
		    <th>Status</th>
		  </tr>
		</thead>
		<tbody>
		  <?php
		  	$i = 1;
		  	foreach ($requests as $key => $value) {	

		  		$status = "Pending";
		  		if($value['status'] == 1)
		  			$status	 = "Approved"; 		  				
		  		echo '<tr>';
		  		echo '<td>'.$i.'</td>'; $i++;
		  		echo '<td>'.$value['child_name'].'</td>';
		  		echo '<td>'.$value['reason'].'</td>';
		  		echo '<td>'.$status.'</td>';
		  		echo '</tr>';
		  	}
		  ?>
		</tbody>
	</table>
</div>