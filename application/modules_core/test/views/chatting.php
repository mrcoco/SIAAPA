    <?php
            session_start();
            $_SESSION['username'] = $this->session->userdata('username'); // Must be already set
    ?>
    <script src="js/jquery.js"></script>
    <script src="js/chat.js"></script>
    <!-- drag the chat box  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
    <script src="js/jquery/ui/jquery.ui.draggable.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css"/>
    <link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
    <link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />
    <!--[if lte IE 7]>
    <link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
    <![endif]-->
     <script type="text/javascript">
     // handle the dragable process of the chat box
    $(function(){
        if($(".chatbox")[0]) {
            $(".chatbox").draggable();
        }
        $('.chatboxhead').live('click',function () {
            $(".chatbox").draggable();
        });
    });
    </script>