<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KPL | Admin | Players </title>
    <?php $this->load->view('css'); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!-- menu profile quick info -->
            <?php $this->load->view('left-profile'); ?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php $this->load->view('sidebar'); ?>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <?php $this->load->view('top-bar'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Players</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Players</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="col-md-12 ">
                    <a class="btn btn-app col-md-2" href="<?php echo site_url();?>addPlayer">
                      <i class="fa fa-plus"></i> Add New player
                    </a>
                  </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <table id="datatable-fixed-header" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Profile Pic</th>
                                  <th>Mobile No</th>
                                  <th>Team Code</th>
                                  <th>Created at</th>
                                  <th>Updated at</th>
                                </tr>
                              </thead>

                            <tbody>
                                <?php if(!empty($players)){
                                  
                                  foreach ($players as $player ) {
                                    $row = '';
                                    $row .= '<tr><td>'.$player['usr_id'];
                                    $row .= '</td><td>'.$player['usr_name'];
                                    $row .= '</td><td>'.$player['usr_email'];
                                    $row .= '</td><td>'.'<a style="color:blue;" href="'.$player['usr_profile_pic'].'">Click here to see the Profile Pic</a>';
                                    $row .= '</td><td>'.$player['usr_mobile_number'];
                                    $row .= '</td><td>'.$player['usr_team_code'];
                                    $row .= '</td><td>'.$player['created_at'];
                                    $row .= '</td><td>'.$player['updated_at'].'</td></tr>';
                                    echo $row;
                                  }
                                }?>
                            </tbody>
                      
                          </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            KPL - Kothrud Premier League</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <?php $this->load->view('js'); ?>
    <script type="text/javascript">
      $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });
    </script>
  </body>
</html>
