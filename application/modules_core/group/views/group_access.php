<form action="" method="post" id="myform" class="input">
		<table border="0" width="100%" class="data">
			<tr height="20px">
			  <th width="30" rowspan="2" style="padding:0px 0px 0px 5px;">No</th>
			  <th width="439" rowspan="2">Nama Module</th>
			  <th colspan="<?php echo count($actions);?>">Action</th>
		  </tr>
		  <tr style="font-size:11px; font-weight:normal;">
		  	<?php if(count($actions)>0){
				foreach($actions as $m){
			?>
		  	  <th width="10px" style="padding:5px;"><a href="#" class="south" style="color:#fff; text-decoration:none;" title="<?php echo $m->action_name;?>"><?php echo substr($m->action_name,0,5);?></a></th>
			<?php } 
				}
			?>
		  </tr>
		  <?php if(count($access) > 0){
		  		$no=1;
		  		foreach($access as $r){
		  ?>
		  			<tr>
						<td align="center"><?php echo $no++;?>.</td>
						<td><?php echo $r['module_name'];?></td>
						<?php 
							if(count($r['action'])>0){
								foreach($r['action'] as $acc){
									if($acc['show']==1){
										$chk = ($acc['value']==1)?'checked="checked"':'';
										$name_chk = "acc_name[".$r['id_module']."][".$acc['id']."]";
										echo "<td align='center'><input type='checkbox' $chk name='$name_chk' value='".$acc['id']."' style='cursor:pointer;' class='south' title='".$acc['name']."'></td>";
									}else{
										echo "<td align='center'>-</td>";
									}
								} 
							}
						?>
					</tr>	
		  <?php } 
		  	}		  
		  ?>
		  <tr>
		  	<td colspan="<?php echo count($actions)+2;?>"><a href="<?php echo $own_links;?>" class="btnsimpan" style="padding:8px; text-decoration:none;"> &laquo; Kembali</a>
			<input type="submit" value="Simpan" class="btnsimpan" name="simpan" style="float:right;"/></td>
		  </tr>
		</table>
		</form>