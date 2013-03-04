<?php
    session_start();
    // Must be already set
    $_SESSION['username'] = $this->session->userdata('username');
?>
<link rel="stylesheet" type="text/css"   href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css"/>
<!-- Chat styles   -->
<link type="text/css" rel="stylesheet" media="all" href="asseets/chat/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="asseets/chat/css/css/screen.css" />
<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->
<script type="text/javascript" src="asseets/chat/js/jquery.js"></script>
<script type="text/javascript" src="asseets/chat/js/chat.js"></script>
<!-- drag the chat box  -->
<script type="text/javascript"   src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
<script src="js/jquery/ui/jquery.ui.draggable.js"></script>
<script type="text/javascript">
    $(function(){
        if($(".chatbox")[0]) {
            $(".chatbox").draggable();
        }
        $('.chatboxhead').live('click',function () {
            $(".chatbox").draggable();
        });
    });
</script>
<!--   *************   DISPLAY ONLINE USERS LIST *********************************  -->
    <table width="96%" cellspacing="1" cellpadding="2" id="chatUsersTbl">
       <tbody>
          <tr>
             <th>User Id</th>
             <th>User Name</th>
          </tr>
        <?php
        /*
            These users list get from users controller.Not in the chat controller.
        */
        foreach($UsersList->result() as $Users){ ?>
          <tr>
            <td><?php echo $Users->user_id; ?></td>
            <td>
               <a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $Users->user_name; ?>');">
                  <?php echo $Users->user_name; ?>
               </a>
            </td>
         </tr>
        <?php
        }
        ?>
        </tbody>
    </table>