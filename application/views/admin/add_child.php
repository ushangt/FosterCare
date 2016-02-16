<?php
if(!isset($child)){
  $name = "";
  $age = "";
  $image = "";
  $gender = "";
  $child_race = "";
  $medical_condition = "";
  $status = "1";
  $action = "action_add_child";
}
else
{
  $name = $child['name'];
  $age = $child['age'];
  $image = $child['image'];
  $gender = $child['sex'];
  $child_race = $child['race'];
  $medical_condition = $child['medical_condition'];
  $status = $child['status'];
  $action = "action_edit_child";
}
?>
<div class="row">
  <div class="col s12 m12">
    <div class="card-panel">
      <h4 class="header2">Child Details</h4>
      <div class="row">
        <form class="col s12" method="POST" action="<?=$action;?>" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s12">
              <input id="name" type="text" name="name" value="<?=$name;?>" required>
              <label for="name">Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="age" type="text" name="age" value="<?=$age;?>" required>
              <label for="age">Age</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m4 l3">
              Upload Child Image
            </div>
            <div class="col s12 m4">
              <input id="age" type="file" name="userfile">
            </div>
            <div class="col s12 m4">
              <?php
              if($image!=""){
                ?>
                  <image src="<?=base_url();?>uploads/<?=$image;?>" width="50" height="50">
              <?php } ?>
            </div> 
          </div>
          <div class="row">
            <div class="col s12 m4 l3">
              Gender
            </div>
            <div class="col s12 m8 l9">
              <p>
                <input name="sex" type="radio" id="male" value="M" <?php echo $gender=='M'?'checked':'';?> required/>
                <label for="male">Male</label>
              </p>
              <p>
                <input name="sex" type="radio" id="female" value="F" <?php echo $gender=='F'?'checked':'';?> required/>
                <label for="female">Female</label>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m4 l3">
              Race
            </div>
            <div class="col s12 m8 l9">
              <select name="race" required>
                <option value="">Choose your option</option>
                <?php
                foreach ($race as $key => $value) {
                  $selected = "";
                  if($value['id'] == $child_race)
                    $selected = "selected";
                  echo "<option value='".$value['id']."' ".$selected.">".$value['race']."</option>";
                }
                ?>            
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m4 l3">
              Medical Condition
            </div>
            <div class="col s12 m8 l9">
              <select name="medical_condition" required>
                <option value="">Choose your option</option>
                <?php
                foreach ($medical as $key => $value) {
                  $selected="";
                  if($value['id'] == $medical_condition)
                    $selected = "selected";
                  echo "<option value='".$value['id']."' ".$selected.">".$value['medical_condition']."</option>";
                }
                ?> 
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m4 l3">
              Status
            </div>
            <div class="col s12 m8 l9">
              <p>
                <input name="status" type="radio" id="1" value="1" <?php echo $status=='1'?'checked':'';?> required/>
                <label for="1">Active</label>
              </p>
              <p>
                <input name="status" type="radio" id="0" value="0" <?php echo $status=='0'?'checked':'';?> required/>
                <label for="0">Deactive</label>
              </p>
            </div>
          </div>
          <input type="hidden" name="image" value="<?=$image;?>">
          <input type="hidden" name="child_id" value="<?=@$this->input->get('child_id');?>">
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