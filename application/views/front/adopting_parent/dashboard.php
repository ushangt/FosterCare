<?php
if($parent_financials)
{?>
	<div class="card  light-green">
	  <div class="card-content white-text">
	    <span class="card-title">All set</span>
	    <p>You are a verified user</p>
	    <p>You can start meeting children</p>
	  </div>  
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <?php
}
else
{?>
	<div class="card  red">
	  <div class="card-content white-text">
	    <span class="card-title">Attention !!!</span>
	    <p>You are not a verified user</p>
	    <p>Please fill in your personal details. Otherwise you won't be allowed to setup meeting with the child.</p>
	  </div>  
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <?php
}

?>