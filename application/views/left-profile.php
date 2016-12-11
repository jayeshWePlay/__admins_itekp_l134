<div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><img src="<?php echo base_url('assets/');?>images/KPL_logo.png" style="max-width:50px;"> <span>KPL</span></a>
            </div>

            <div class="clearfix"></div>
<div class="profile">
              <div class="profile_pic">
                <img src="<?php echo base_url('assets/');?>images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php $sess = $this->session->userdata("login");
                    print_r($sess['admin_data'][0]['adm_username']); ?></h2>
              </div>
            </div>