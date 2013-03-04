
//<?php
//session_start();
//$saya = $this->dx_auth->get_username();
//$targetnya = 'admin';
//$_SESSION['username'] = $saya; // Must be already set
//?>

<!-- end of secondary bar -->
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
<div class="spacer"></div>
	<aside id="sidebar" class="column">
            
<!--		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Content</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="#">New Article</a></li>
			<li class="icn_edit_article"><a href="#">Edit Articles</a></li>
			<li class="icn_categories"><a href="#">Categories</a></li>
			<li class="icn_tags"><a href="#">Tags</a></li>
		</ul>
		<h3>Users</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">Add New User</a></li>
			<li class="icn_view_users"><a href="#">View Users</a></li>
			<li class="icn_profile"><a href="#">Your Profile</a></li>
		</ul>
		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>
-->
		<h3>Welcome .. ! <?php echo $this->dx_auth->get_username(); ?></h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="<?php echo base_url();?>config/employee/edit/<?php echo $this->dx_auth->get_employee_id(); ?>">Profile</a></li>
                                                        <li class="icn_audio"><a href="javascript:void(0)" onclick="javascript:chatWith('<?=$targetnya?>')">Chat With <?=$targetnya?></a></li>
			<li class="icn_security"><a href="<?php echo base_url();?>auth/change_password">Change Password</a></li>
			<li class="icn_jump_back"><a href="<?php echo base_url();?>logout">LogOut</a></li>
		</ul>
		<footer>

		</footer>
	</aside><!-- end of sidebar -->
        
<section id="main" class="column">
