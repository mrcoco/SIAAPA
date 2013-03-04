<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotations extends MY_Controller
{
    function __construct() 
    {
        parent::__construct();

        
    }
    //============================================================================================================
    //General Quotation
    function index()
    {
        $id = $this->uri->segment(4);
//    if ($id != 9){
        $status_valid = $this->db->get_where('aap_qt', array('id'=>$id))->row(status);
    if (($status_valid != 9)&&($status_valid != 10)){        
        
        if($this->input->get('delete'))
            {
                $delete_status_update = array(
                   "status" => 99,
                   "user_delete" => $this->dx_auth->get_user_id(),
                   "time_delete" => date('Y-m-d H:i:s')
                );
                   $this->db->update('aap_qt',$delete_status_update,array('id' => $this->input->get('delete')));
          }
        $crud=new grocery_CRUD();
//        $crud->set_theme('datatables');
        $crud->set_table('aap_qt')
        ->set_subject('General Quotation')
        ->columns('id_quotation','id_insured','rate','discount','tsi','brokerage','status');
        $crud    ->set_relation('id_quotation','aap_mstr_quotation','quotation_name')
                        ->set_relation('id_insured','aap_mstr_company','company_name');
//        $crud->where('status !=', 99); // jenis status 99=Delete
//        $crud->add_fields('id_quotation','id_insured','risk_location','occupation','period','rate','discount','brokerage','deductibles','clauses','note','remainder');    
        $crud->unset_delete();
//        $crud->add_action('Closing', '', '','ui-icon-minus',array($this,'delete_status_row'));
        $crud->display_as('id_quotation','Quotation')
                ->display_as('id_insured','Insured')
                ->display_as('risk_location','Risk Location');
        $crud->field_type('currency','enum',array('IDR','USD','EUR','SGD','GBP','MYR','YEN','AUD','DM'));
        $crud->callback_field('period',array($this,'field_period'));
        $crud->callback_field('discount',array($this,'field_discount'));
        $crud->callback_field('brokerage',array($this,'field_brokerage'));
        $crud->callback_column('status',array($this,'_callback_webpage_url'));
        if ($this->dx_auth->groupid_saya()== 117){ //marketing Group
            $crud->fields('id_quotation','id_insured','principal','obligee','risk_location','occupation','poi_begin','poi_end','currency','tsi','discount','note','reminder');
            $crud->edit_fields('principal','obligee','risk_location','occupation','period','currency','discount','note','reminder');
            $crud->or_where('status',2); $crud->or_where('status',9); $crud->or_where('status',10);
            $crud->callback_insert(array($this,'gq_marketing_insert'));
            $crud->callback_before_update(array($this, 'gq_marketing_update'));
        }elseif ($this->dx_auth->groupid_saya()== 120) { //Marketing Supervisor
            $crud->edit_fields('risk_location','occupation','poi_begin','poi_end','currency','tsi','discount','brokerage','note','reminder','status');
            $crud->or_where('status',1); $crud->or_where('status',4); $crud->or_where('status',9); $crud->or_where('status',10);
            $crud->unset_add();    
            $crud->field_type('status','dropdown',array('2' => 'Reject to Admin Marketing','3' => 'Continue to Technic','9'=>'Closing File'));
            $crud->display_as('status','Select Status');
            $crud->callback_before_update(array($this, 'gq_marketing_ps_update'));
        }elseif ($this->dx_auth->groupid_saya()== 118) { //Technic Group
            $crud->edit_fields('principal','obligee','wording','risk_location','occupation','poi_begin','poi_end','currency','tsi','discount','brokerage','note','reminder','status');
            $crud->or_where('status',3); $crud->or_where('status',5); $crud->or_where('status',9); $crud->or_where('status',10);
            $crud->unset_add();
            $crud->change_field_type('principal','readonly');
            $crud->change_field_type('obligee','readonly');
            $crud->change_field_type('risk_location','readonly');
            $crud->change_field_type('occupation','readonly');
            $crud->change_field_type('currency','readonly');
            $crud->field_type('status','dropdown',array('5' => 'Progress','4' => 'Reject to Marketing','10'=>'Approved'));
        }elseif ($this->dx_auth->groupid_saya()== 121) { //Bonding --- > epy
            $crud->fields('id_quotation','id_insured','risk_location','occupation','period','currency','discount','note','reminder');
            $crud->field_type('status','dropdown',array('11' => 'Pending', '12' => 'Approved'));    
        }elseif ($this->dx_auth->groupid_saya()== 1) { //admin 
//            $crud->or_where('status', 99);
        }else{
                $crud->unset_edit();
                $crud->unset_delete();
        }
        
        $output=$crud ->render(); 
        $state = $crud->getState();
        if($state == 'edit'){
            if($row->status== 9){
//                $crud->set_subject('General Quotation jhsgdf jshdfg jshdgf jsdhfgjs dgfjg ');
                return site_url('quotations/');
            }
        }
        $this->_v('quotations',$output);
    }else{
        redirect('/quotations');
    }
    
    }
        public function _callback_webpage_url($value, $row){
//            $s_value = $value
            if ($value==0){ $s_value = 'Pending';
                return "<a href='".site_url('quotations/index/edit/'.$row->id)."'>$s_value</a>";
            }elseif($value==1){ $s_value = 'Waiting to Verification';
                return "<a href='".site_url('quotations/index/edit/'.$row->id)."'>$s_value</a>";
            }elseif($value==2){ $s_value = 'Cancel By Supervisor';
                return "<a href='".site_url('quotations/index/edit/'.$row->id)."'>$s_value</a>";
            }elseif($value==3){ $s_value = 'Waiting to Verifivation';
                return "<a href='".site_url('quotations/index/edit/'.$row->id)."'>$s_value</a>";
            }elseif($value==4){ $s_value = 'Cancel By Technic';
                return "<a href='".site_url('quotations/index/edit/'.$row->id)."'>$s_value</a>";
            }elseif($value==5){ $s_value = 'Progress';
                return "<a href='".site_url('quotations/index/edit/'.$row->id)."'>$s_value</a>";
            }elseif($value==10){ $s_value = 'Approved';
                return "<h4><a href='".site_url('quotations/q_status/edit/'.$row->id)."'>$s_value</a></h4>";
            }elseif($value==9){ $s_value = 'Closing File';
                return "<h4><a class='more' href='".site_url('quotations/q_status/edit/'.$row->id)."'>$s_value</a></h4>";
//                return "<a href='".site_url('quotations/index/edit/'.$row->id)."><span>$s_value</span></a>";
            }
        }
        function field_period($value = '', $primary_key = null){
            return '<input type="text" maxlength="3" value="'.$value.'" name="period" style="width:30px">  month';}
        function field_discount($value = '', $primary_key = null){
            return '<input type="text" maxlength="5" value="'.$value.'" name="discount" style="width:50px">  % ex: 99.99';}
        function field_brokerage($value = '', $primary_key = null){
            return '<input type="text" maxlength="5" value="'.$value.'" name="brokerage" style="width:50px">  % ex: 99.99';}    
        function delete_status_row($primary_key, $row){
            if (($row->status== 'Approved') && ($row->status== 'Closing File')){
                
                return site_url('quotations/');
            }else{
                return site_url('quotations/index/').'?delete='.$row->id;
            }
        }
        function gq_marketing_insert($post_array) {
            $post_array['status'] = 1;
            $post_array['user_add'] = $this->dx_auth->get_user_id();
            $post_array['time_add'] = date('Y-m-d H:i:s');  
//           return $this->db->update('aap_qt',$post_array,array('id' => $primary_key));
           return $this->db->insert('aap_qt',$post_array);
        }
        function gq_marketing_update($post_array, $primary_key) {
            $post_array['status'] = 1;
            $post_array['user_update'] = $this->dx_auth->get_user_id();
            $post_array['time_update'] = date('Y-m-d H:i:s');  
            return $this->db->update('aap_qt',$post_array,array('id' => $primary_key));
        }
        function gq_marketing_sp_update($post_array, $primary_key) {
            $post_array['status'] = 3;
            $post_array['user_update'] = $this->dx_auth->get_user_id();
            $post_array['time_update'] = date('Y-m-d H:i:s');  
            return $this->db->update('aap_qt',$post_array,array('id' => $primary_key));
        }
        function gq_sebelum_insert($post_array){
            $post_array['user_add'] = $this->dx_auth->get_user_id();
            $post_array['time_add'] = date('Y-m-d H:i:s');  
            return $this->db->insert('aap_qt',$post_array);
        }
        function gq_sebelum_update($post_array, $primary_key){
            $post_array['user_update'] = $this->dx_auth->get_user_id();
            $post_array['time_update'] = date('Y-m-d H:i:s');
           return $this->db->update('aap_qt',$post_array,array('id' => $primary_key));
        }
        
    function q_status($id){
        
        $id = $this->uri->segment(3);
        $status_valid = $this->db->get_where('aap_qt', array('id'=>$id))->row(status);
        $crud=new grocery_CRUD();
        $crud->set_table('aap_qt');
        $crud->set_relation('id_quotation','aap_mstr_quotation','quotation_name')
                ->set_relation('id_insured','aap_mstr_company','company_name');
        $crud->columns('id_quotation','id_insured','principal','obligee','wording','risk_location','occupation','poi_begin','poi_end','currency','tsi','discount','brokerage','note','reminder');
        $crud->fields('id_quotation','id_insured','principal','obligee','wording','risk_location','occupation','poi_begin','poi_end','currency','tsi','discount','brokerage','note','reminder');
        $crud->change_field_type('id_quotation','readonly');
//        $crud->callback_edit_field('id_quotation', array($this, 'get_id_quotation'));
        $crud->change_field_type('id_insured','readonly');
        $crud->change_field_type('principal','readonly');
        $crud->change_field_type('obligee','readonly');
        $crud->change_field_type('wording','readonly');
        $crud->change_field_type('risk_location','readonly');
        $crud->change_field_type('occupation','readonly');
        $crud->change_field_type('poi_begin','readonly');
        $crud->change_field_type('poi_end','readonly');
        $crud->change_field_type('currency','readonly');
        $crud->change_field_type('tsi','readonly');
        $crud->change_field_type('discount','readonly');
        $crud->change_field_type('brokerage','readonly');
        $crud->change_field_type('note','readonly');
        $crud->change_field_type('reminder','readonly');
        $crud->unset_delete();
//        $crud->field_type('status','dropdown',array('9' => 'Approved', '10' => 'Close File'));   
//        $crud->change_field_type('status', 'enum', array('9' => 'Approved', '10' => 'Close File'));
//        $crud->change_field_type('status','readonly');
        $crud->unset_add();
        if ($status_valid == 10){
            $crud->set_subject('Quotation - Approved');
             $crud->or_where('status',10);
        }elseif ($status_valid == 9) {
            $crud->set_subject('Quotation - Close File');
             $crud->or_where('status',9);
        }
        $output=$crud ->render(); 
        $state = $crud->getState();
        if(($state == 'list')&&($state == 'success')){
//            return site_url('quotations/');
            redirect('/quotations');
        }
        $this->_v('quotations',$output);
    }
    function get_id_quotation($value, $row){
    $name = aap_qt::find_by_id_quotation($value);
$nameAttr = $name->attributes();
$string = $nameAttr['firstname'] . ' ' . $nameAttr['lastname'];
return $string;
}
    //============================================================================================================
    
    //============================================================================================================
    //Asuransi Kendaraan Bermotor
     function akb()
    {
        $akb=new grocery_CRUD();
        $akb->set_table('aap_qt')
        ->set_subject('Motorcycle Insurance')
        ->columns('id_quotation','wording','id_insured','type_kendaraan','guna_kendaraan','tsi','periode','coverages','deductibles','clauses','note','rate','security');
        
        //manampilkan field dengan nama aslinya
        $akb ->display_as('id_insured','Insured')
             ->display_as('tsi','Hari Pertanggungan')
             ->display_as('type_kendaraan','Jenis/Merk/Jenis Kendaraan')
             ->display_as('period','Jangka waktu Pertanggungan')
             ->display_as('deductibles','Potongan Klaim/Resiko Sendiri')
             ->display_as('clauses','klausul/Ketentuan Tambahan')
             ->display_as('note','Perlengkapan Non Standart(Jika Ada)')
             ->display_as('rate','Rate/Premi')
             ->display_as('security','Penanggung')
             ->display_as('id_quotation','Class Of Insurance');
        
        
        $akb->add_fields('id_quotation','wording','id_insured','type_kendaraan','guna_kendaraan','tsi','periode','coverages','deductibles','clauses','note','rate','security');
        $akb->edit_fields('id_quotation','wording','id_insured','type_kendaraan','guna_kendaraan','tsi','periode','coverages','deductibles','clauses','note','rate','security');
        $akb->required_fields('id_quotation','wording','id_insured','type_kendaraan','guna_kendaraan','tsi','periode','coverages','deductibles','clauses','note','rate','security');
        $output=$akb ->render(); 
        
        $this->_v('quotations',$output);
        
    } 
    //Builder's Risks Insurance
    function bri()
    {
        $bri=new grocery_CRUD();
        $bri->set_table('aap_qt')
        ->set_subject('Builders Risks Insurance')
        ->columns('id_quotation','id_insured','period','interest','vessel','tsi','risk_location','conditions','warranty','p_warranty','deductibles','rate');
        $bri     ->display_as('id_insured','Insured')
                 ->display_as('tsi','Insured Value')
                 ->display_as('risk_location','Location Of Yeard')
                 ->display_as('p_warranty','Premium Warranty')
                 ->display_as('id_quotation','Class Of Insurance');
        
        
        $bri->add_fields('id_quotation','id_insured','period','interest','vessel','tsi','risk_location','conditions','warranty','p_warranty','deductibles','rate');
        $bri->edit_fields('id_quotation','id_insured','period','interest','vessel','tsi','risk_location','conditions','warranty','p_warranty','deductibles','rate');
        $bri->required_fields('id_quotation','id_insured','period','interest','vessel','tsi','risk_location','conditions','warranty','p_warranty','deductibles','rate');
        $output=$bri ->render(); 
        
        $this->_v('quotations',$output);
        
    }
    
    //Quotation Public Liability
    function pb()
    {
        $pb=new grocery_CRUD();
        $pb->set_table('aap_qt')
        ->set_subject('Public Liability')
        ->columns('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $pb      ->display_as('id_insured','Insured Address')
                 ->display_as('occupation','Insured Business/Project')
                 ->display_as('period','Period Of Insured')
                 ->display_as('security','Underwriters')
                 ->display_as('id_quotation','Type Of Insurance');
        
        
        $pb->add_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $pb->edit_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $pb->required_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $output=$pb ->render(); 
        
        $this->_v('quotations',$output);
        
    }
    
    //Quotation Product Liability & Completed Operations
    function plc()
    {
        $plc=new grocery_CRUD();
        $plc->set_table('aap_qt')
        ->set_subject('Product Liability & Completed Operations')
        ->columns('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $plc      ->display_as('id_insured','Insured Address')
                 ->display_as('occupation','Insured Business/Project')
                 ->display_as('period','Period Of Insured')
                 ->display_as('security','Underwriters')
                 ->display_as('id_quotation','Type Of Insurance');
        
        
        $plc->add_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $plc->edit_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $plc->required_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $output=$plc ->render(); 
        
        $this->_v('quotations',$output);
        
    }
    
    //Quotation Employers Liability
    function el()
    {
        $el=new grocery_CRUD();
        $el->set_table('aap_qt')
        ->set_subject('Employers Liability')
        ->columns('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $el      ->display_as('id_insured','Insured Address')
                 ->display_as('occupation','Insured Business/Project')
                 ->display_as('period','Period Of Insured')
                 ->display_as('security','Underwriters')
                 ->display_as('id_quotation','Type Of Insurance');
        
        
        $el->add_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $el->edit_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $el->required_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $output=$el ->render(); 
        
        $this->_v('quotations',$output);
        
    }
    
    //Quotation Workmen Compensation
    function wrk()
    {
        $wrk=new grocery_CRUD();
        $wrk->set_table('aap_qt')
        ->set_subject('Workmen Compensation')
        ->columns('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $wrk      ->display_as('id_insured','Insured Address')
                 ->display_as('occupation','Insured Business/Project')
                 ->display_as('period','Period Of Insured')
                 ->display_as('security','Underwriters')
                 ->display_as('id_quotation','Type Of Insurance');
        
        
        $wrk->add_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $wrk->edit_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $wrk->required_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $output=$wrk ->render(); 
        
        $this->_v('quotations',$output);
        
    }
    
    //Quotation Automobile Liability
    function auto()
    {
        $auto=new grocery_CRUD();
        $auto->set_table('aap_qt')
        ->set_subject('Automobile Liability')
        ->columns('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $auto    ->display_as('id_insured','Insured Address')
                 ->display_as('occupation','Insured Business/Project')
                 ->display_as('period','Period Of Insured')
                 ->display_as('security','Underwriters')
                 ->display_as('id_quotation','Type Of Insurance');
        
        
        $auto->add_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $auto->edit_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $auto->required_fields('id_quotation','id_insured','occupation','risk_location','period','coverages','deductibles','premium','security','rate','poi_begin','poi_end');
        $output=$auto ->render(); 
        
        $this->_v('quotations',$output);
        
    }
    
    //Quotation Directors & Officers Liability Insurance
    function dol()
    {
        $dol=new grocery_CRUD();
        $dol->set_table('aap_qt')
        ->set_subject('Directors & Officers Liability Insurance')
        ->columns('id_quotation','id_insured','pb_practice','poi_begin','poi_end','limit_of_indemnity','retroactive_date','deductibles','premium','tsi','extensions');
        $dol    ->display_as('id_insured','Insured Address')
                ->display_as('tsi','Pilih')
                 ->display_as('pb_practice','Professional Business Practice')
                 ->display_as('id_quotation','Type Of Insurance');
        
        
        $dol->add_fields('id_quotation','id_insured','pb_practice','poi_begin','poi_end','limit_of_indemnity','retroactive_date','deductibles','premium','tsi','extensions');
        $dol->edit_fields('id_quotation','id_insured','pb_practice','poi_begin','poi_end','limit_of_indemnity','retroactive_date','deductibles','premium','tsi','extensions');
        $dol->required_fields('id_quotation','id_insured','pb_practice','poi_begin','poi_end','limit_of_indemnity','retroactive_date','deductibles','premium','tsi','extensions');
        $output=$dol ->render(); 
        
        $this->_v('quotations',$output);
        
    }
    
    //Quotation Marine Cargo Insurance
    function mci()
    {
        $mci=new grocery_CRUD();
        $mci    ->set_table('aap_qt')
                ->set_subject('Marine Cargo Insurance')
                ->columns('id_quotation','id_insured','period','interest_insured','voyage','vessel','limit_of_indemnity','coverages','security','poi_begin','poi_end');
        $mci    ->display_as('id_insured','Insured Address')
                ->display_as('security','Underwriters')
                ->display_as('id_quotation','Type Of Insurance');
        
        
        $mci->add_fields('id_quotation','id_insured','period','interest_insured','voyage','vessel','limit_of_indemnity','coverages','security','poi_begin','poi_end');
        $mci->edit_fields('id_quotation','id_insured','period','interest_insured','voyage','vessel','limit_of_indemnity','coverages','security','poi_begin','poi_end');
        $mci->required_fields('id_quotation','id_insured','period','interest_insured','voyage','vessel','limit_of_indemnity','coverages','security','poi_begin','poi_end');
        $output=$mci ->render(); 
        
        $this->_v('quotations',$output);
        
    }
    
    //Quotation Marine Cargo Insurance
    function qtr()
    {
        $qtr=new grocery_CRUD();
        $qtr->set_table('aap_qt')
            ->set_subject('Contractors/ Erection All Risks Insurance')
            ->columns('id_quotation','wording','id_insured','project_name','risk_location','period','interest_insured','deductibles','clauses','premium');
        $qtr    ->display_as('id_insured','Insured Address')
                ->display_as('wording','Policy Wording')
                ->display_as('id_quotation','Type Of Insurance')
                ->display_as('project_name','The Project Name')
                ->display_as('risk_location','The Project Site')
                ->display_as('period','Period Of Insured')
                ->display_as('deductibles','Deductible')
                ->display_as('clauses','Clauses')
                ->display_as('premium','Premium');
        
        $qtr->add_fields('id_quotation','wording','id_insured','project_name','risk_location','period','interest_insured','deductibles','clauses','premium');
        $qtr->required_fields('id_quotation','wording','id_insured','project_name','risk_location','period','interest_insured','deductibles','clauses','premium');
        $output=$qtr ->render(); 


        $this->_v('quotations',$output);
        
        
    }
    
    function bank($id_quotation=5)
    {
        $bank=new grocery_CRUD();
        $bank->where('id_quotation',25);
        $bank->set_theme('datatables');
        $bank->set_table('aap_qt')
        ->set_subject('Bank Garansi')
        ->columns('type_insured','principal','obligee','occupation','period','tsi','premi_note','brokerage');
        $bank   ->add_fields('type_insured','principal','obligee','occupation','period','tsi','premi_note','brokerage')               
                ->edit_fields('type_insured','principal','obligee','occupation','period','tsi','premi_note','brokerage');
        $bank   ->display_as('type_insured','Type Of Insurance')
                ->display_as('principal','Principal')
                ->display_as('obligee','Obligee')
                ->display_as('occupation','Working')
                ->display_as('period','Periode')
                ->display_as('tsi','TSI')
                ->display_as('premi_note','Premi Note')
                ->display_as('brokerage','Brokerage');
        $bank   ->callback_insert(array($this,'bank_sebelum_insert'))
                    ->callback_update(array($this,'bank_sebelum_update'));
//        $bank   ->field_type('id_quotation', 'hidden', $id_quotation);
        $output = $bank ->render(); 
        $this->_v('quotations',$output);
    }
        function bank_sebelum_insert($post_array)
        {
            $post_array['id_quotation'] = 25;
            $post_array['user_add'] = $this->dx_auth->get_user_id();
            $post_array['time_add'] = date('Y-m-d H:i:s');  
            return $this->db->insert('aap_qt',$post_array);
        }
        function bank_sebelum_update($post_array, $primary_key)
        {
            $post_array['user_update'] = $this->dx_auth->get_user_id();
            $post_array['time_update'] = date('Y-m-d H:i:s');
           return $this->db->update('aap_qt',$post_array,array('id' => $primary_key));
        }
       
}

?>
