<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KPL | Admin | Home </title>
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
                <h3>Home</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Teams</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="col-md-12 ">
                    <a class="btn btn-app col-md-2" href="<?php echo site_url();?>addTeam">
                      <i class="fa fa-plus"></i> Add New Team
                    </a>
                  </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <table id="datatable-fixed-header" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Code</th>
                                  <th>Name</th>
                                  <th>Logo</th>
                                  <th>Home color</th>
                                  <th>Away color</th>
                                  <th>Created at</th>
                                  <th>Updated at</th>
                                  <th class="no-sort">Action</th>
                                </tr>
                              </thead>

                            <tbody>
                                <?php if(!empty($teams)){
                                  
                                  foreach ($teams as $team ) {
                                    $row = '';
                                    $row .= '<tr><td>'.$team['tm_id'];
                                    $row .= '</td><td>'.$team['tm_code'];
                                    $row .= '</td><td>'.$team['tm_name'];
                                    $row .= '</td><td>'.'<a style="color:blue;" href="'.$team['tm_logo'].'">Click here to see the Logo</a>';
                                    $row .= '</td><td style="color:'.$team['tm_home_color'].';">'.$team['tm_home_color'];
                                    $row .= '</td><td style="color:'.$team['tm_away_color'].';">'.$team['tm_away_color'];
                                    $row .= '</td><td>'.$team['created_at'];
                                    $row .= '</td><td>'.$team['updated_at'].'</td>';
                                    $row .= '</td><td class="text-center"><a href="#"><span class="badge bg-blue"><i class="fa fa-edit"></i></span></a>&nbsp;&nbsp;&nbsp;<a href="#"><span class="badge bg-red"><i class="fa fa-remove"></i></span></a></td></tr>';
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
