  
   <script src="<?=base_url()?>js/test/ajaxfileupload.js"></script>
   <link href="<?=base_url()?>js/test/ajaxfileupload.css" rel="stylesheet" />

<script type="text/javascript">
function ajaxFileUpload()
	{
		//starting setting some animation when the ajax starts and completes
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});
		
		/*
			prepareing ajax file upload
			url: the url of script file handling the uploaded files
                        fileElementId: the file type of input element id and it will be the index of  $_FILES Array()
			dataType: it support json, xml
			secureuri:use secure protocol
			success: call back function when the ajax complete
			error: callback function when the ajax failed
			
                */
		$.ajaxFileUpload
		(
			{
				url:'doajaxfileupload.php', 
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							alert(data.error);
						}else
						{
							alert(data.msg);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;

	} 
        
  </script>

<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
  
<?php endforeach; ?>
<?php echo $output; ?>