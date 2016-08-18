<?php
$imgBasePath = 'assets/img/';

//get team from url.
$json = (isset($_GET['data'])) ? $_GET['data'] : 'data';

//get Json
$json = "data/".$json.".json";

$members = json_decode(file_get_contents($json))->members;
if (isset($_POST['password'])) {
    if ($_POST['password'] == 'becaideogi') {
        foreach ($members as &$member) {
            $member->times = 0;
        }
        
        // And the put updated info into JSON file
        file_put_contents($json, json_encode(array('members' => $members)));
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bê nước SD2 </title>

        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Popper CSS -->
        <link href="assets/jquery-popper/dist/popper.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body  style="background: url('assets/img/thu.jpg') no-repeat 100% 100%;background-size: 100% 100%;">

        <nav class="navbar navbar-inverse navbar-fixed-top php-nav">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1 class="navbar-brand" href="#">Bê nước v0.0</h1>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#pop">Hên xui</a></li>
                        <li><a href="#stats">Thống kê</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <div id="pop">
                <a href="#" data-primary>Chuẩn bị !</a>
                <?php foreach ($members as $key => $member): ?>
                <a href="#">
                    <img src="<?php echo $imgBasePath . $member->avatar?>" class="img-circle"/>
                </a>
                <?php endforeach;?>
            </div>
            
            <div id="stats">
                <h2>Thống kê</h2>
                <div class="table-responsive">          
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Đồng chí</th>
                                <th>Số lần bê nước</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($members as $key => $member):?>
                            <tr class="row-member <?php if ($key%2):?>info<?php else:?>success<?php endif?>">
                                <td><?php echo $key + 1?></td>
                                <td class="cell-name"><?php echo $member->name?></td>
                                <td class="cell-times"><?php echo $member->times?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal">Reset!</button>
                </div>
            </div>
        </div><!-- /.container -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form id="reset-form" method="post" action="">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <input type="password" class="form-control reset-password" placeholder="Password" name="password">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Do it!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="assets/jquery-popper/dist/popper.js"></script>
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/snow.js"></script>
    </body>
</html>
