<div class="row">
	<div class="col s12 m12">
		<div class="card-panel">
			<h4 class="header2">Meeting Preferences</h4>
			<div class="row">
				<form class="col s12" method="POST" action="action_set_meeting">
					<div class="row">
						<div class="col s12 m4 l3">
		                  <p>Select a Date</p>
		                </div>
		                 <div class="col s12 m8 l9">
		                  <input type="date" class="datepicker" name="meeting_date">
		                </div>
					</div>
					<div class="row">
						<div class="col s12 m4 l3">
		                  <p>Select a Time</p>
		                  (08:00 to 17:00 Hrs)
		                </div>
		                <div class="col s12 m8 l9">
		                  <p class="range-field">
		                      <input type="range" id="test5" min="8" max="17" name="meeting_time"/>
		                   </p>
		                </div>
					</div>
					<input type="hidden" name="child_id" value="<?=@$child_id;?>">
					<div class="row">
		              <div class="input-field col s12">
		                <button class="btn cyan waves-effect waves-light right" type="submit">Submit
		                  <i class="mdi-content-send right"></i>
		                </button>
		              </div>
		            </div>
				</form>
			</div>
		</div>
	</div>
</div>
<br><br><br><br><br><br><br><br><br><br>