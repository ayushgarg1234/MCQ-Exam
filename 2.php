<?php

require '0.php';
?>

<form action="2.php" method="GET">
    choose a food type :
	<select name="uh">
	<option value="u">Unhealthy</option>
	<option value ="h">Healthy</option>
	</select><br><br>
	<input type="submit" value="submit">
</form>




<?php

if(isset($_GET['uh'])&& !empty($_GET['uh'])){
  echo $uh=$_GET['uh'];
 
   $uh=strtolower($_GET['uh']);

  if($uh=='u'|| $uh=='h'){

$query="SELECT `food`,`calories` FROM `food` WHERE `healthy_unhealthy`='$uh'  ORDER BY `id`";
if($query_run = mysql_query($query)){

   if(mysql_num_rows($query_run)==NULL){
echo 'No results found';
   }else{
    while($querry_row = mysql_fetch_assoc($query_run)){
	echo '<br>';
	$food = $querry_row['food'];
	$calories=$querry_row['calories'];

	echo $food.'has'.$calories.'calories.<br>';


	}
   }

}else{

  echo  mysql_error();
  }
 }
}

?>
