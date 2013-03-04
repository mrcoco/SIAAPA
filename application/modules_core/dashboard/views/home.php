<html>
<head>
</head>
<body>
test 1 by Url    :  <?php  echo anchor("$url1",'test 1');?><?php  echo anchor("$url2",'test 1');?>
<br>
<br>
<?php echo form_open("$url1");?>
<?php echo form_open("$url2");?>
test 2 by Form   :  <input type="text" name="test">&nbsp;<input type="submit" value="tes">
</form>
</body>
</html>

