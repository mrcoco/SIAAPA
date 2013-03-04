
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    
    <title>Sistem Informasi PT AA Pialang Asuransi</title>
    <meta name="author" content="Reko Srowako" />
    <meta name="description" content="Sistem Informasi PT AA Pialang Asuransi" />
    <meta name="keywords" content="siaapa,sistem,informasi,asuransi,pialang" />
    <meta name="application-name" content="Sistem Informasi PT AA Pialang Asuransi" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Le styles -->
    <link href="http://aapialang.co.id/icare/style/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="http://aapialang.co.id/icare/style/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="http://aapialang.co.id/icare/style/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css" />
    <link href="http://aapialang.co.id/icare/style/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="http://aapialang.co.id/icare/style/plugins/uniform/uniform.default.css" type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="http://aapialang.co.id/icare/style/css/main.css" rel="stylesheet" type="text/css" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
        <link type="text/css" href="css/ie.css" rel="stylesheet" />
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="http://aapialang.co.id/icare/style/images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://aapialang.co.id/icare/style/images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://aapialang.co.id/icare/style/images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://aapialang.co.id/icare/style/images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="http://aapialang.co.id/icare/style/images/apple-touch-icon-57-precomposed.png" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body class="loginPage">
        
        <div class="container-fluid">
            <div align="center" class="page-header">
                <img href="http://aapialang.co.id/icare" src="http://aapialang.co.id/icare/images/logo.png" align="center" width="405px" />
                <h5 align="center">OLEOS 1 Building, 6th floor Suite 622 Jl. Mampang Prapatan Raya No.139B Kalibata - Jakarta Selatan 12740. Phone.+62 21 7997 044 (hunting) & Fax.+62 21 7997 043</h5>         
            </div>                   
        </div>      
        
    <div class="container-fluid">
        <div class="loginContainer">
            <form class="form-horizontal" action="http://aapialang.co.id/ci/auth/forgot_password" method="post" accept-charset="utf-8">
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Note : </strong> <?php echo $auth_message ?>
                </div>
                        </div>
                    </div>
                </div>


                
            </form>
        </div>

    </div><!-- End .container-fluid -->

    <!-- Le javascript
    ================================================== -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://aapialang.co.id/icare/style/js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="http://aapialang.co.id/icare/style/plugins/touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="http://aapialang.co.id/icare/style/plugins/ios-fix/ios-orientationchange-fix.js"></script>
    <script type="text/javascript" src="http://aapialang.co.id/icare/style/plugins/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="http://aapialang.co.id/icare/style/plugins/uniform/jquery.uniform.min.js"></script>



 
    <script type="text/javascript">
        // document ready function
        $(document).ready(function() {
            //------------- Some fancy stuff in error pages -------------//
            $('.loginContainer').hide();
            $('.loginContainer').fadeIn(1000).animate({
                '0%': "30%", 'margin-top': +($('.loginContainer').height()/-30 -1)
                }, {duration: 2000, queue: false}, function() {
                // Animation complete.
            });
        });
    </script>

    </body>
</html>
