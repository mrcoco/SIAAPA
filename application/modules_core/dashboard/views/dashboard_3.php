<div class="centercontent">
    <div id="contentwrapper" class="contentwrapper widgetpage">
        <div class="one_half">
            <div class="widgetbox">
                <div class="title"><h3>Recent Activity</h3></div>
                <div class="widgetoptions">
                    <div class="right">
                        <a href="activity">View All Activity</a>
                    </div>
                    <a href="activity/index/add">Add Activity</a>
                </div>
                <div class="widgetcontent">
                    <ul class="recent_list">
                        <?php               
                        if(count($activity) > 0){
                            foreach($activity as $r){?>
                        <?
                            $kalimat    = $r->note;
                            $id         = $r->id;
                        ?>    
                            <li class="calendar new">
                                <div class="msg">
                                    <? $user_link = '<a href="/icare/activity/user/'.$r->user_add.'">'.$this->aap_lib->get_employee_name($r->user_add).'</a>';
                                    echo $user_link.' >> '.$this->aap_lib->potong_text($kalimat,50).'... <a href="#">Read More</a>';
                                    ?>
                                </div>
                        <?php 
                            } 
                        }
                        ?>
                </div><!--widgetcontent-->
            </div><!--widgetbox-->
        </div><!--one_half-->
        <div class="one_half last">
            <div class="widgetbox">
                <div class="title"><h3>Project Activity</h3></div>
                <div class="widgetoptions">
                    <div class="right">
                        <a href="activity/project">View All Activity</a>
                    </div>
                    <a href="activity/project/add">Add Activity</a>
                </div>
                <div class="widgetcontent">
                    <ul class="recent_list">
                        <?php               
                        if(count($project_report) > 0){
                            foreach($project_report as $r){?>
                        <?
                            $kalimat    = $r->note;
                            $id         = $r->id;
                            $id_company = $r->id_mstr_company;
                        ?>    
                            <li class="calendar new">
                                <div class="msg"> 
                                    <? $user_link = '<a href="/icare/activity/project/'.$r->id_mstr_company.'">'.$this->aap_lib->get_company_name($id_company).'</a>';
                                    echo $user_link.' >> '.$this->aap_lib->potong_text($kalimat,50).'... <a href="/icare/activity/index/edit/'.$id.'">Read More</a>';
                                    ?>
                                </div>
                        <?php 
                            } 
                        }
                        ?>
                </div><!--widgetcontent-->
            </div><!--widgetbox-->
        </div><!--one_half last-->
    </div><!--contentwrapper-->
</div><!-- centercontent -->