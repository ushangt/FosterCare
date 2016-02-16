 <!-- START LEFT SIDEBAR NAV-->
 <?php
 $role = "";
 switch($this->session->userdata('ROLE_ID')){
    case 1:
        $role = "Administrator";
        break;
    case 2:
        $role = "Adopting Parent";
        break;
    case 3:
        $role = "Biological Parent/Guardian";
        break;
}
 ?>
<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="<?=base_url();?>assets/images/profile.png" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">                    
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?=$this->session->userdata('NAME');?></a>
                    <p class="user-roal"><?=$role;?></p>
                </div>
            </div>
        </li>
        <li class="bold"><a href="<?=base_url();?>front/adopting_parent" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
        </li>   
        <li class="bold"><a href="<?=base_url();?>front/personal_details" class="waves-effect waves-cyan"><i class="mdi-content-content-paste"></i> Personal Details</a>
        </li>  
        <li class="bold"><a href="<?=base_url();?>front/search_child" class="waves-effect waves-cyan"><i class="mdi-action-search"></i> Search Child</a>
        </li>           
        <li class="no-padding">  
            <ul class="collapsible collapsible-accordion">          
               <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-communication-chat"></i> Meetings</a>
                  <div class="collapsible-body">
                      <ul>
                          <li><a href="<?=base_url();?>front/search_child">Setup a Meeting</a>
                          </li>
                          <li><a href="<?=base_url();?>front/past_meetings">Past Meetings</a>
                          </li>
                      </ul>
                  </div>
                </li>
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-vertical-align-bottom"></i> Adoption</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="<?=base_url();?>front/adoption">Create Request</a>
                            </li>
                            <li><a href="<?=base_url();?>front/past_adoptions">Past Requests</a>
                            </li>                                  
                        </ul>
                    </div>
                </li>
            </ul>
        </li>                                                               
    </ul>          
</aside>
<!-- END LEFT SIDEBAR NAV-->