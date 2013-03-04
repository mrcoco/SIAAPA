<div class="clearfix"></div>
<div class="invoice-footer">
    <table style="height: 68px; width: 650px;" border="0">
        <tbody>
            <tr>
                <td colspan="2"><strong class="green">OLEOS 1</strong> Building, 6th floor Suite 622 Jl. Mampang Prapatan Raya No.139B Kalibata - Jakarta Selatan 12740.</td>
            </tr>
            <tr>
                <td>Phone.</td>
                <td>+62 21 7997 044 (hunting)</td>
            </tr>
            <tr>
                <td>Fax.</td>
                <td>+62 21 7997 043</td>
            </tr>
        </tbody>
    </table>
    <p><small>
        <?php //echo $this->aap_lib->get_app_Config_value('AAP_Copyright'); ?>
        Sistem Informasi AA Pialang Asuransi <?php echo $this->aap_lib->get_app_Config_value('AAP_Version'); ?>
        This support for : Internet Explorer, Mozilla FireFox, Opera.
        <? echo "Your IP address is [".$this->input->ip_address()."] and using the browser [".$this->input->user_agent()."] we have recorded."; ?>
        Page rendered in {elapsed_time} seconds. RAM {memory_usage}
        </small>
    </p>
</div>

</div>
</div><!-- End .box -->
</div>
</div><!-- End .row-fluid -->
</div><!-- End contentwrapper -->
</div><!-- End #content -->
</div><!-- End #wrapper -->

    
    
    


   

<? 
    if ($this->dx_auth->nama_saya() == 'Webmaster'){
        $this->output->enable_profiler(true); 
    }
?> 
<!-- Debug Mode -->   
    
</body>


</html>