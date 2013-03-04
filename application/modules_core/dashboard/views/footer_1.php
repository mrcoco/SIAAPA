<script type="text/javascript"> $(document).ready(function(){ $("body div:last").remove();}); </script><div style="visibility:hidden"><a href="http://apycom.com/">Apycom jQuery Menus</a></div>

<script type="text/javascript" src="http://aapialang.co.id/icare/templates/icare/js/custom/widgets.js"></script>
                        <div class="widgetbox">
                            <div class="title"><h3><?php echo $this->aap_lib->get_app_Config_value('AAP_Copyright'); ?></h3></div>
                            <div class="widgetcontent">
                                <div id="tabs">
                                    <ul>
                                        <li><a href="#tabs-1">Information</a></li>
                                        <li><a href="#tabs-2">Version</a></li>
                                        <li><a href="#tabs-3">About</a></li>
                                    </ul>
                                    <div id="tabs-1">
                                        <ul class="listthumb">
                                            <li>OLEOS 1 Building, 6th floor Suite 622 Jl. Mampang Prapatan Raya No.139B Kalibata - Jakarta Selatan 12740. Phone.+62 21 7997 044 (hunting)  Fax.+62 21 7997 043</li>
                                        </ul>
                                    </div>
                                    <div id="tabs-2">
                                        <ul>
                                            <a>Sistem Informasi AA Pialang Asuransi <?php echo $this->aap_lib->get_app_Config_value('AAP_Version'); ?></a>
                                            This support for :
                                            <li>Mozilla FireFox</li>
                                            <li>Internet Explorer</li>
                                            <li>Google Chrome</li>
                                            <li>Opera</li>
                                        </ul>
                                    </div>
                                    <div id="tabs-3">
                                        <ul class="thumb">
                                            <li>Belum Tersedia</li>
                                        </ul>     
                                    </div>
                                </div><!--#tabs-->
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->
<!--<table>-->
        <?php //echo $this->aap_lib->get_app_Config_value('AAP_Copyright'); ?>
        Sistem Informasi AA Pialang Asuransi <?php echo $this->aap_lib->get_app_Config_value('AAP_Version'); ?>
        This support for : Internet Explorer, Mozilla FireFox, Opera.
        <? echo "Your IP address is [".$this->input->ip_address()."] and using the browser [".$this->input->user_agent()."] we have recorded."; ?>
        Page rendered in {elapsed_time} seconds. RAM {memory_usage}
<!--</table>-->
<!--</div>-->
<!-- centercontent -->
<!--</div>-->
<!--bodywrapper-->


<? // $this->output->enable_profiler(true); ?> 
<!-- Debug Mode -->   
    
</body>


</html>