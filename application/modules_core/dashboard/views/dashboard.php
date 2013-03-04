<?

//echo $this->dx_auth->is_username_available('reko');
//echo $tes123;
?>

<div class="row-fluid"> <div class="span6">
    <div class="box gradient">
        <div class="title">
            <h4>
                <span class="icon16 icomoon-icon-power"></span>
                <span>Daily Activity Report</span>
                <div class="right">
                    <a href="activity/index/add"><button class="btn btn-success">Add</button></a>
                    <a href="activity"><button class="btn btn-primary" >View All</button></a>
                </div>
            </h4>
        </div>
        <div class="content noPad">
            <ul class="activity">
                <? if(count($activity) > 0){
                    foreach($activity as $r){
                        $kalimat    = $r->note;
                        $id         = $r->id;
                        $time_add   = $r->time_add;
                ?>   
                <li>
                    <span class="icon16 icomoon-icon-copy gray"></span>
                    <small><? $user_link = '<a href="/icare/activity/user/'.$r->user_add.'">'.$this->aap_lib->get_employee_name($r->user_add).'</a>';
                                    echo $user_link.' >> '.$this->aap_lib->potong_text($kalimat,40).'... <a aria-hidden="true" class="entypo-icon-export" href="#modal'.$id.'"data-toggle="modal"> Read More</a> '.$time_add.'</small>';
                                    ?>
                    <div id="modal<? echo $id; ?>" class="modal hide fade" style="display: none; ">
                        <div class="modal-header">
                            <h4>Daily Activity Report </h4><? echo $this->aap_lib->get_employee_name($r->user_add).' - ['.$time_add.']'; ?> 
                        </div>
                        <div class="modal-body">
                            <div class="paddingT15 paddingB15">
                                <? echo $kalimat ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </li>
                 <?php 
                            } 
                        }
                        ?>
            </ul>
        </div>
    </div><!-- End .box -->
</div><!-- End .Daily Activity Report -->
              
<div class="span6">
    <div class="box gradient">
        <div class="title">
            <h4>
                <span class="icon16 icomoon-icon-power"></span>
                <span>Activity Projects</span>
                <div class="right">
                    <a href="activity/project/add"><button class="btn btn-success">Add</button></a>
                    <a href="activity/project"><button class="btn btn-primary" >View All</button></a>
                </div>
            </h4>
        </div>
        <div class="content noPad">
            <ul class="activity">
                <?php
                    if(count($project_report) > 0){
                        foreach($project_report as $r){
                            $kalimat    = $r->note;
                            $id         = $r->id;
                            $id_company = $r->id_mstr_company;
                ?>
                <li>
                    <span class="icon16 entypo-icon-document gray"></span>
                    <small><? $user_link = '<a href="/icare/activity/project/'.$r->id_mstr_company.'">'.$this->aap_lib->get_company_name($id_company).'</a>';
                            echo $user_link.' >> '.$this->aap_lib->potong_text($kalimat,50).'... <a aria-hidden="true" class="entypo-icon-export" href="#project'.$id.'"data-toggle="modal"> Read More</a> '.$time_add.'</small>';
                            ?>
                    <div id="project<? echo $id; ?>" class="modal hide fade" style="display: none; ">
                        <div class="modal-header">
                            <h4>Activity Project </h4><? echo $this->aap_lib->get_company_name($id_company).' - ['.$time_add.']'; ?> 
                        </div>
                        <div class="modal-body">
                            <div class="paddingT15 paddingB15">
                                <? echo $kalimat ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </li>
                <?php 
                        } 
                    }
                ?>
            </ul>
        </div>
    </div><!-- End .box -->
</div></div><!-- End .Activity Projects -->  





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
                                        <li class="user clearfix">
                                            <a href="#" class="avatar">
                                                <img src="<?php echo base_url();?>style/images/avatar2.jpeg" alt="" />
                                            </a>
                                            <div class="message">
                                                <div class="head clearfix">
                                                    <span class="name"><strong>Reko</strong> says:</span>
                                                    <span class="time">25 seconds ago</span>
                                                </div>
                                                <p>
                                                    Masih Percobaan .... !!
                                                    Belum berfungsi dengan baik
                                                </p>
                                            </div>
                                        </li>
                                        <li class="admin clearfix">
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
                                        </li>
                                        
                                    </ul>

                                </div>

                            </div><!-- End .box -->


</div></div><!-- End .message -->
                        
                        