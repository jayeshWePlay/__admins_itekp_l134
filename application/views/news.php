<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KPL | Admin | News </title>
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
                <h3>News</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>News</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="col-md-12 ">
                    <a class="btn btn-app col-md-2" href="<?php echo site_url();?>addNews">
                      <i class="fa fa-plus"></i> Add News
                    </a>
                  </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <table id="datatable-fixed-header" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Author Name</th>
                                  <th>Date</th>
                                  <th>Profile Pic</th>
                                  <th>Title</th>
                                  <th>Preview</th>
                                  <th>Created at</th>
                                  <th>Updated at</th>
                                </tr>
                              </thead>

                            <tbody>
                                <?php if(!empty($news)){
                                  
                                  foreach ($news as $news1 ) {
                                    $row = '';
                                    $row .= '<tr><td>'.$news1['news_id'];
                                    $row .= '</td><td>'.$news1['author_name'];
                                    $row .= '</td><td>'.$news1['date'];
                                    $row .= '</td><td>'.'<a style="color:blue;" href="'.$news1['image'].'">Click here to see the Profile Pic</a>';
                                    $row .= '</td><td>'.$news1['title'];
                                    $row .= '</td><td>'.$news1['description'];
                                    $row .= '</td><td>'.$news1['created_at'];
                                    $row .= '</td><td>'.$news1['updated_at'].'</td></tr>';
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
