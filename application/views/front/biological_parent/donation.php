<div class="row">
<div class="col s12 m12">
  <div class="card-panel">
    <h4 class="header2">Child Details</h4>
    <div class="row">
      <form class="col s12" method="POST" action="action_donation" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s12">
            <input id="name" type="text" name="name">
            <label for="name">Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="age" type="text" name="age">
            <label for="age">Age</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m4 l3">
            Upload Child Image
          </div>
          <div class="col s12 m8 l9">
            <input id="age" type="file" name="userfile">
          </div>
        </div>
        <div class="row">
          <div class="col s12 m4 l3">
            Gender
          </div>
          <div class="col s12 m8 l9">
            <p>
              <input name="sex" type="radio" id="male" value="M"/>
              <label for="male">Male</label>
            </p>
            <p>
              <input name="sex" type="radio" id="female" value="F" />
              <label for="female">Female</label>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m4 l3">
            Race
          </div>
          <div class="col s12 m8 l9">
            <select name="race">
              <option value="">Choose your option</option>
              <?php
              foreach ($race as $key => $value) {
                echo "<option value='".$value['id']."''>".$value['race']."</option>";
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
            <select name="medical_condition">
              <option value="">Choose your option</option>
              <?php
              foreach ($medical as $key => $value) {
                echo "<option value='".$value['id']."''>".$value['medical_condition']."</option>";
              }
              ?> 
            </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="reason" type="text" name="reason" length="255">
            <label for="reason">Reason for Donation</label>
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