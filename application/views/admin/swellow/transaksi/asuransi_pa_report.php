<script >
$(document).ready(function(){
	$("#dstart, #dend").datepicker({
		dateFormat : "yy-mm"
	});
});
</script>
<style >
table.data tr td,table.data tr th{
	font-size: 2px;
}
</style>

<form style="padding:5px; width:100%;" id="frm-search" method="post" class="cari" action="<?php echo $own_links;?>search">
	<input type="hidden" name="column" value="all" />
	<img src="<?php echo themeUrl();?>images/cari.png" align="left" />
	<input type="text" name="keyword" value="<?php echo isset($key)?$key:'';?>" size="20" />
    <select name="column">
		<?php cat_search($cat_search);?>
    </select>     
    <?php 
        $prd = isset($this->jCfg['isearch']['periode'])?$this->jCfg['isearch']['periode']:date('Y-m');
        $pp = $this->jCfg['isearch']['per_page'];
	$st = isset($this->jCfg['isearch']['status'])?$this->jCfg['isearch']['status']:"all";
    ?> 
    Periode = 123
    <select name="periode" id="periode">
        <option value="">Semua Periode</option>
        <?php for($bulan=1; $bulan<=13; $bulan++){?>
                <option value="<?php echo date('Y-m', strtotime('-'.$bulan.' month'))?>"<?php echo ($prd==date('Y-m', strtotime('-'.$bulan.' month')))?'selected="selected"':'';?>><?php echo date('Y-m', strtotime('-'.$bulan.' month'))?></option>
         <?php } ?>
    </select>
<!--	<input type="text" id="dstart" name="dstart" value="<?php //echo $this->jCfg['isearch']['start_date'];?>" size="8" class="picker"/> s/d 
	<input type="text" name="dend" id="dend" value="<?php //echo $this->jCfg['isearch']['end_date'];?>" size="8" class="picker" />-->
	<input type="submit" name="cari" class="btn-cari" value="Cari" />
	<input type="button" onclick="document.location=SELF_URL" name="reset" class="btn-reset" value="Reset" />
<?php if(isset($data) && count($data) > 0){ ?>
		<input type="button" name="download-excel" id="donlot" onclick="_getExcel()" class="btn-cari" value="Download Excel" />
<?php } ?>	
	<select style="padding:5px; height:30px; float:right; margin-right:10px; cursor:pointer;" name="per_page" class="item_submit">
		<option value="5" <?php echo ($pp=='5')?'selected="selected"':'';?> >5</option>
		<option value="10" <?php echo ($pp=='10')?'selected="selected"':'';?> >10</option>
		<option value="50" <?php echo ($pp=='50')?'selected="selected"':'';?>>50</option>
		<option value="100" <?php echo ($pp=='100')?'selected="selected"':'';?>>100</option>
		<option value="200" <?php echo ($pp=='200')?'selected="selected"':'';?>>200</option>
                                     <option value="500" <?php echo ($pp=='500')?'selected="selected"':'';?>>500</option>
                                     <option value="1000" <?php echo ($pp=='1000')?'selected="selected"':'';?>>1000</option>
                                     <option value="2000" <?php echo ($pp=='2000')?'selected="selected"':'';?>>2000</option>
                                     <option value="5000" <?php echo ($pp=='5000')?'selected="selected"':'';?>>5000</option>
	</select>
</form>

<?php if(isset($data) && count($data) > 0){ ?>
<div class="clr"></div>
<?php echo $paging;?>
<div class="clr"></div>
<div style="padding: 2px; background-color: #FF9; border: 1px solid #FC3; margin-bottom: 2px; font-size: 8px;">
  <table cellpadding="0" cellspacing="0" class="data"> 
    <tr></tr>
    <tr>
      <th><p style="font-size: 8px;">No</p></th>
      <th><p align="left" style="font-size: 8px;">Entry by</p></th>
      <th><p style="font-size: 8px;">No Pasilitas</p></th>
      <th><p style="font-size:8px;">Nama</p></th>
      <th><p style="font-size:8px;">Alamat</p></th>
      <th><p style="font-size:8px;">Tgl Lahir</p></th>
      <th><p style="font-size:8px;">USIA</p></th>
      <th><p style="font-size:8px;">Tgl Akad</p></th>
      <th><p style="font-size:8px;">Tgl Cair Akad</p></th>
      <th><p style="font-size:8px;">Tgl Akhir Akad</p></th>
      <th><p style="font-size:8px;">Periode</p></th>
      <th><p style="font-size:8px;">Plafond</p></th>
      <th><p style="font-size:8px;">Tarif Premi Jiwa(%)</p></th>
      <th><p style="font-size:8px;">Premi Asuransi Garis</p></th>
      <th><p style="font-size:8px;">Objek Agn 1</p></th>
      <th><p style="font-size:8px;">Ket Agn 1</p></th>
      <th><p style="font-size:8px;">Rate (%o) Agn 1</p></th>
      <th><p style="font-size:8px;">Premi Agn 1</p></th>
      <th><p style="font-size:8px;">Objek Agn 2</p></th>
      <th><p style="font-size:8px;">Ket Agn 2</p></th>
      <th><p style="font-size:8px;">Rate (%o) Agn 2</p></th>
      <th><p style="font-size:8px;">Premi Agn 2</p></th>
      <th><p style="font-size:8px;">Objek Agn 3</p></th>
      <th><p style="font-size:8px;">Ket Agn 3</p></th>
      <th><p style="font-size:8px;">Rate (%o) Agn 3</p></th>
      <th><p style="font-size:8px;">Premi Agn 3</p></th>
      <th><p style="font-size:8px;">Total Premi Asuransi Agunan</p></th>
      <!--        <th><p align="center" style="font-size:8px;">Options</p></th>-->
    </tr>
    <?php if(isset($data) && count($data) > 0){
		$no=1;
		foreach($data as $r){
				$premi =  ($r->detail_uang_ptg * $r->detail_periode_ptg * $r->detail_tarif_premi)/100;
		?>
    <tr>
      <td><?php echo $no++;?></td>
      <td><p title ="<?php echo getEmp($r->entry_by_emp_id);?>" style="font-size:8px;"><?php echo getUser($r->entry_by_user_id);?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_no;?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_nama;?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_alamat;?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_tgllahir;?></p></td>
      <td align="center"><p style="font-size:8px;"><?php echo $r->detail_usia;?> Thn</p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_tglakad;?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_tglcair;?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_tgl_akhir_akad;?></p></td>
      <td align="center"><p style="font-size:8px;"><?php echo $r->detail_periode_ptg;?> Bln</p></td>
      <td><p style="font-size:8px;"><?php echo myNum($r->detail_uang_ptg); ?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_tarif_premi; ?></p></td>
      <td><p style="font-size:8px;"><b><?php echo myNum($r->detail_premi_pag); ?></b></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_obj_ptg;?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_obj_alamat;?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_tarif_premi_paa;?>%o</p></td>
      <td><p style="font-size:8px;"><?php echo myNum($r->detail_premi_paa_a1);?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_obj_ptg2;?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_obj_alamat2;?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_tarif_premi_paa2;?>%o</p></td>
      <td><p style="font-size:8px;"><?php echo myNum($r->detail_premi_paa_a2);?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_obj_ptg3;?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_obj_alamat3;?></p></td>
      <td><p style="font-size:8px;"><?php echo $r->detail_tarif_premi_paa3;?>%o</p></td>
      <td><p style="font-size:8px;"><?php echo myNum($r->detail_premi_paa_a3);?></p></td>
      <td><p style="font-size:8px;"><b><?php echo myNum($r->detail_premi_paa);?></b></p></td>
      <?php //if ($kembali == 1){ ?>
      <!--                <td><a href="<?php //echo "../edit/".$r->detail_id;?>"  title="Edit"><img src="<?php //echo themeUrl();?>images/edit.png" /></a>&nbsp;<a href="<?php //echo "../delete_item/".$r->detail_id;?>"  title="Hapus"><img src="<?php //echo themeUrl();?>images/delete.png" /></a></td>-->
      <?php //} ?>
      <?php
                if ($this->jCfg['user']['id'] == 2){ ?>
      <td><a href="<?php echo "testing123/".$r->pa_id;?>"  title="Edit"><img src="<?php echo themeUrl();?>images/edit.png" /></a>&nbsp;<a href="<?php echo "../delete_item/".$r->detail_id;?>"  title="Hapus"><img src="<?php echo themeUrl();?>images/delete.png" /></a></td>
      <?php } ?>
    </tr>
    <?php } 
	}
	?>
  </table>
	<?php
		$jumlah_p = 0; $jumlah_j = 0; $jumlah_a = 0; 
		foreach($data as $m){
			//$premi =  ($m->detail_uang_ptg * $m->detail_periode_ptg * $m->detail_tarif_premi)/100;
			$premi_p =  $m->detail_uang_ptg; $premi_j =  $m->detail_premi_pag; $premi_a =  $m->detail_premi_paa;
			$jumlah_p += $premi_p; $jumlah_j += $premi_j; $jumlah_a += $premi_a; 
		}
	?>

<table class="data">
    <tr>
        <td>
            <h2 style="font-size:15px; float:left;">Total Data : <?php echo count($data);?> data</h2>
            <h2 style="font-size:15px; float:right;">Total Uang Pertanggungan   : </h2></td>
        <td><h2 style="font-size:15px; float:right;"><?php echo myNum($jumlah_p);?></h2></td>
    <td>
    <tr>
        <td> <h2 style="font-size:15px; float:right;">Total Premi Jiwa : </h2></td>
        <td><h2 style="font-size:15px; float:right;"><?php echo myNum($jumlah_j);?></h2></td>
    <td>
    <tr>
        <td> <h2 style="font-size:15px; float:right;">Total Premi Agunan  : </h2></td>
        <td><h2 style="font-size:15px; float:right;"><?php echo myNum($jumlah_a);?></h2></td>
    <td>


</table>
<div class="clr"></div> 

</div>

<?php echo isset($paging)?$paging:'';?>
<?php } ?>




<script language="javascript">
function _getExcel(){
//	col = $('#column').val();
//	ds 	= ( $.trim($('#dstart').val()) == "" )?"all":$.trim($('#dstart').val());
//	de 	= ( $.trim($('#dend').val()) == "" )?"all":$.trim($('#dend').val());
                   prd = $('#periode').val();
	url_go = "<?php echo $own_links;?>get_excel/"+prd;
	document.location = url_go;
}

$('.item_submit').change(function(){
	$('#frm-search').submit();
});
</script>


