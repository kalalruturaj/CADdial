<?php 
$base_url 		= $this->config->item('base_url');
$http_host 		= $this->config->item('http_host');
$base_url_views = $this->config->item('base_url_views');
$base_upload = $this->config->item('upload');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sheetal Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $base_url_views; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $base_url_views; ?>css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $base_url_views; ?>css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $base_url_views; ?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" style="text-align:center;">
                        <h3 class="panel-title">CadDial CRM</h3>
                    </div>
                    <div class="panel-body" style="height:300px;">
                        <form action="<?php echo $base_url;?>index.php/example/login" method="post" enctype="multipart/form-data" id="form">
         <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
		<INPUT TYPE="hidden" NAME="action" VALUE="login">
        
                            <fieldset>
                             <div class="form-group" style="text-align:center; height:30px;">
                                  <span><strong> CadDial LOGIN</strong></span>
                                </div>
                                <div id="error"><?php echo "demo" ;?></div>
                                <div class="form-group" style="margin-top:30px;">
                                    <input class="form-control" placeholder="User Name" name="txtUserName" type="text" autofocus>
                                </div>
                                <div class="form-group" style="margin-top:20px;">
                                    <input class="form-control" placeholder="Password" name="txtPassword" type="password" value="">
                                </div>
                              <div class="form-group" style="margin-top:30px;">
                                    <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Login" >
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                               
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo $base_url_views; ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $base_url_views; ?>js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $base_url_views; ?>js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $base_url_views; ?>js/sb-admin-2.js"></script>

</body>

</html>
