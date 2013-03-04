<div class="row-fluid"><div class="span12">
        <div class="box gradient">
            <div class="title">
                <h4>
                    <span class="icon16 silk-icon-chat"></span>
                    <span>Messages layout</span>
                </h4>
            </div>
                                <div class="content noPad">

                                    <ul class="messages">
                                        
                <? if(count($messages) > 0){
                    foreach($messages as $r){
                        $kalimat            = $r->note_content;
                        $from_user_id       = $r->from_user_id;
                ?>
                                        
                                        <li class="user clearfix">
                                            <a href="#" class="avatar">
                                                <img src="<?php echo base_url();?>style/images/avatar2.jpeg" alt="" />
                                            </a>
                                            <div class="message">
                                                <div class="head clearfix">
                                                    <span class="name"><strong><? echo $this->aap_lib->get_employee_name($from_user_id); ?></strong> says:</span>
                                                </div>
                                                <p>
                                                    <? echo $kalimat; ?>
                                                </p>
                                            </div>
                                        </li>
                                        
                 <?php 
                            } 
                        }
                        ?>                      
                                        
<!--                                        <li class="admin clearfix">
                                            <a href="#" class="avatar">
                                                <img src="<?php echo base_url();?>style/images/avatar3.jpeg" alt="" />
                                            </a>
                                            <div class="message">
                                                <div class="head clearfix">
                                                    <span class="name"><strong>webmaster</strong> says:</span>
                                                    <span class="time">just now</span>
                                                </div>
                                                <p>
                                                    Automatic send by Webmaster
                                                    Data telah tersimpan
                                                </p>
                                            </div>
                                        </li>

                                        <li class="sendMsg">
                                            <form class="form-horizontal" action="#" />
                                                <textarea class="elastic" id="textarea" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
                                                <button type="submit" class="btn btn-info marginT10">Send message</button>
                                            </form>
                                        </li>-->
                                        
                                    </ul>

                                </div>

                            </div><!-- End .box -->


</div></div><!-- End .message -->


<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<?php echo $output; ?>