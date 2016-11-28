<!--
      ___           ___           ___           ___           ___           ___                         ___     
     /__/\         /__/\         /  /\         /  /\         /  /\         /  /\                       /  /\    
    _\_ \:\        \  \:\       /  /:/_       /  /::\       /  /::\       /  /:/_                     /  /::|   
   /__/\ \:\        \__\:\     /  /:/ /\     /  /:/\:\     /  /:/\:\     /  /:/ /\    ___     ___    /  /:/:|   
  _\_ \:\ \:\   ___ /  /::\   /  /:/ /:/_   /  /:/~/:/    /  /:/~/:/    /  /:/ /:/_  /__/\   /  /\  /  /:/|:|__ 
 /__/\ \:\ \:\ /__/\  /:/\:\ /__/:/ /:/ /\ /__/:/ /:/___ /__/:/ /:/___ /__/:/ /:/ /\ \  \:\ /  /:/ /__/:/ |:| /\
 \  \:\ \:\/:/ \  \:\/:/__\/ \  \:\/:/ /:/ \  \:\/:::::/ \  \:\/:::::/ \  \:\/:/ /:/  \  \:\  /:/  \__\/  |:|/:/
  \  \:\ \::/   \  \::/       \  \::/ /:/   \  \::/~~~~   \  \::/~~~~   \  \::/ /:/    \  \:\/:/       |  |:/:/ 
   \  \:\/:/     \  \:\        \  \:\/:/     \  \:\        \  \:\        \  \:\/:/      \  \::/        |  |::/  
    \  \::/       \  \:\        \  \::/       \  \:\        \  \:\        \  \::/        \__\/         |  |:/   
     \__\/         \__\/         \__\/         \__\/         \__\/         \__\/                       |__|/    


    CricAPI is a product of Wherrelz IT Solutions Private Limited

    By using this product you agree to the terms and conditions as defined & updated on the website.

-->

<?php

//	$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/cricket/?apikey=Abg2C2Tlh2WrSW203FqVuDxjn3u2');	// change with your API key
//	$cricketMatches = json_decode($cricketMatchesTxt);
//echo "<pre>";
//print_r($cricketMatches->data);
//die;


$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/ballByBall/?unique_id=1059715&apikey=Abg2C2Tlh2WrSW203FqVuDxjn3u2');	// change with your API key
	$cricketMatches = json_decode($cricketMatchesTxt);
echo "<pre>";
print_r($cricketMatchesTxt);
die;



    foreach($cricketMatches->data as $item) {
?>
	<h4><?php echo($item->title); ?></h4>
<?php } ?>