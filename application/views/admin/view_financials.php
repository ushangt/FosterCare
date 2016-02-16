 <h2> Parent Details </h2>
 <table class="striped">
	  <tr>
	    <td> Name </td>
	    <td> <?=$financials[0]['name'];?> </td>	    	   
	  </tr>
	  <tr>
	    <td> Email </td>
	    <td> <?=$financials[0]['email'];?> </td>	    	   
	  </tr>
	  <tr>
	    <td> Contact Number </td>
	    <td> <?=$financials[0]['contact_number'];?> </td>	    	   
	  </tr>
	  <tr>
	    <td> Employed? </td>
	    <td> <?=@$financials[0]['is_employed']==1?"Employed":"Unemployed";?> </td>	    	   
	  </tr>
	  <tr>
	    <td> Salary </td>
	    <td> <?=@$financials[0]['salary'];?> </td>	    	   
	  </tr>
	  <tr>
	    <td> Marital Status </td>
	    <td> <?=@$financials[0]['marital_status'];?> </td>	    	   
	  </tr>
	  <tr>
	    <td> No. of Own Children </td>
	    <td> <?=@$financials[0]['no_of_children'];?> </td>	    	   
	  </tr>
</table>