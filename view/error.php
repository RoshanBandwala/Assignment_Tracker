<?php include('header.php');
// is used to include and evaluate the contents of another PHP file within the current file.
//if any error it will generate warning but continue executing the code unlike "require"

?> 
<h2>Error</h2>
<p><?=$error?></P>
<p><a href=".">Back To List</a></p>
<?php include('footer.php')?>
