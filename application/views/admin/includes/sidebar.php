<?php
$this->load->library('session');
$dt = $this->session->all_userdata();
?>
          <div id="sidebar"  class="nav-collapse " style="z-index:999">
              <ul class="sidebar-menu" id="nav-accordion">

                  <h1 class="centered" style="color:white;margin-bottom: 21%;">
                      <!-- <img src="<?=base_url()?>assets/images/logo.png" style=" width:65%;"> -->
                      ci setup
                  </h1>

                  <li >
                      <a href="<?=base_url()?>index.php/admin" class="active" id="menu_dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>dashboard</span>
                      </a>
                  </li>                 
              </ul>
          </div>
          <script>
            $('.sidebar-menu li a').removeClass('active');
            $('#menu_<?=strtolower($this->uri->segment(2, 0))?>').addClass('active');
          </script>
