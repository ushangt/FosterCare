 <!-- START LEFT SIDEBAR NAV-->
 <?php
 $role = "";
 switch($this->session->userdata('ROLE_ID')){
    case 1:
        $role = "Administrator";
        break;
    case 2:
        $role = "Parent";
        break;
    case 3:
        $role = "Parent";
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
        <li class="bold"><a href="<?=base_url();?>admin/dashboard" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
        </li>              
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-social-people"></i> Child</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="<?=base_url();?>admin/add_child">Add Child</a>
                            </li>    
                            <li><a href="<?=base_url();?>admin/manage_child">Manage Child</a>
                            </li>                                                                                                      
                        </ul>
                    </div>
                </li>
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-circle"></i> Parent</a>
                    <div class="collapsible-body">
                        <ul>                             
                            <li><a href="<?=base_url();?>admin/manage_parent">Manage Parent</a>
                            </li>                                                                                                      
                        </ul>
                    </div>
                </li>
               <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-communication-chat"></i> Meetings</a>
                  <div class="collapsible-body">
                      <ul>                          
                          <li><a href="<?=base_url();?>admin/manage_meetings">Manage Meetings</a>
                          </li>
                      </ul>
                  </div>
                </li>
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-vertical-align-top"></i> Adoption</a>
                    <div class="collapsible-body">
                        <ul>                            
                            <li><a href="<?=base_url();?>admin/manage_adoptions">Manage Requests</a>
                            </li>                                  
                        </ul>
                    </div>
                </li> 
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-vertical-align-bottom"></i> Donation</a>
                    <div class="collapsible-body">
                        <ul>                            
                            <li><a href="<?=base_url();?>admin/manage_donation_requests">Manage Requests</a>
                            </li>                                  
                        </ul>
                    </div>
                </li>                                                                
            </ul>  
        </li>   
    </ul>     
</aside>
<!-- END LEFT SIDEBAR NAV-->