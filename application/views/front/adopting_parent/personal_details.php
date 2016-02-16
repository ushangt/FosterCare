<?php
if(! $details){
  $employed = "";
  $salary = "";
  $marital_status = "";
  $no_of_children = "";  
  $action = "action_add_personal_details";
}
else
{  
  $employed = $details[0]["is_employed"];
  $salary = $details[0]["salary"];
  $marital_status = $details[0]["marital_status"];
  $no_of_children = $details[0]["no_of_children"];   
  $action = "action_edit_personal_details";
}
?>
<div class="row">
  <div class="col s12 m12">
    <div class="card-panel">
      <h4 class="header2">Personal Details</h4>
      <div class="row">
        <form class="col s12" method="POST" action="<?=$action;?>">
          <div class="row">
            <div class="row">
              <div class="col s12 m4 l3">
                Employed ?
              </div>
              <div class="col s12 m8 l9">
                <p>
                  <input name="is_employed" type="radio" id="yes" value="1" <?php echo $employed=='1'?'checked':'';?>/>
                  <label for="yes">Yes</label>
                </p>
                <p>
                  <input name="is_employed" type="radio" id="no" value="0" <?php echo $employed=='0'?'checked':'';?>/>
                  <label for="no">No</label>
                </p>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="salary" type="text" name="salary" value="<?=$salary;?>">
                <label for="salary">Salary (annual)</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 m4 l3">
                Marital Status
              </div>
              <div class="col s12 m8 l9">
                <select name="marital_status">
                  <option value="">Choose your option</option>
                  <?php
                  foreach ($marital as $key => $value) {
                    $selected="";
                    if($value['id'] == $marital_status)
                      $selected = "selected";
                    echo "<option value='".$value['id']."' ".$selected.">".$value['marital_status']."</option>";
                  }
                  ?> 
                </select>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="no_of_children" type="text" name="no_of_children" value="<?=$no_of_children;?>">
                <label for="no_of_children">No. of Children</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <button class="btn cyan waves-effect waves-light right" type="submit">Submit
                  <i class="mdi-content-send right"></i>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
