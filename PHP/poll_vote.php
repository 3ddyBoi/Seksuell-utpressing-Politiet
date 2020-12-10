<?php
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
if(!empty($content)) $array = explode("||", $content[0]);
else $array = [];
if(array_key_exists(0,$array)) $ja = $array[0];
else $ja = 0;
if(array_key_exists(1,$array)) $tror = $array[1];
else $tror = 0;
if(array_key_exists(2,$array)) $nei = $array[2];
else $nei = 0;

if ($vote == 0) {
  $ja = $ja + 1;
}
if ($vote == 1) {
  $tror = $tror + 1;
}
if ($vote == 2) {
  $nei = $nei + 1;
}

//insert votes to txt file
$insertvote = $ja."||".$tror."||".$nei;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<h2 class="poll-h2">Har du noen gang deltatt i utpressing?</h2>
<table>
<h3 class="poll-h3">Ja, men jeg angrer!:</h3>
<img src="\assets\stemme-bar.jpg"
width='<?php echo(100*round($ja/($nei+$tror+$ja),3)); ?>'
height='20'>
<?php echo(100*round($ja/($nei+$tror+$ja),3)); ?>%

<h3 class="poll-h3">Tror ikke det:</h3>
<img src="assets\stemme-bar.jpg"
width='<?php echo(100*round($tror/($nei+$tror+$ja),3)); ?>'
height='20'>
<?php echo(100*round($tror/($nei+$tror+$ja),3)); ?>%

<h3 class="poll-h3">Nei jeg er ikke så slem!:</h3>
<img src="assets\stemme-bar.jpg"
width='<?php echo(100*round($nei/($nei+$tror+$ja),3)); ?>'
height='20'>
<?php echo(100*round($nei/($nei+$tror+$ja),3)); ?>%
</table>