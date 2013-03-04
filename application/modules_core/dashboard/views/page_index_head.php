

<!--<div class="centercontent">-->
<?php // echo $this->uri->segment(1.0).'#'.$this->uri->segment(2.0).'#'.$this->uri->segment(3.0).'#'.$this->uri->segment(); ?>
    <? if( $notibar == 'msginfo' ){ ?>
        <div class="notibar msginfo">
            <a class="close"></a>
            <p><?php echo $notibar_message ?></p>
        </div><!-- notification msginfo -->
    <? } elseif ( $notibar == 'msgsuccess' ) { ?>
        <div class="notibar msgsuccess">
            <a class="close"></a>
            <p><?php echo $notibar_message ?></p>
        </div><!-- notification msgsuccess -->
    <? } elseif ( $notibar == 'msgalert' ) { ?>
        <div class="notibar msgalert">
            <a class="close"></a>
            <p><?php echo $notibar_message ?></p>
        </div><!-- notification msgalert -->
    <? } elseif ( $notibar == 'msgerror' ) { ?>
        <div class="notibar msgerror">
            <a class="close"></a>
            <p><?php echo $notibar_message ?></p>
        </div><!-- notification msgerror -->
    <? } elseif ( $notibar == 'announcement' ) { ?>
        <div class="notibar announcement">
            <a class="close"></a>
            <p><?php echo $notibar_message ?></p>
        </div><!-- notification announcement -->
    <? } ?>



