<?
//#userMainUrl = "http://flight.qunar.com/site/oneway_list_inter.htm?lowestPrice=1&showTotalPr=1&searchDepartureAirport=太原&searchArrivalAirport=IAH&searchDepartureTime=2015-06-06";
//#userMainUrl = http://lp.flight.qunar.com/api/lp_calendar?&dep=太原&arr=休斯敦&dep_date=2015-06-08
header("Content-type: text/html; charset=utf-8"); 
$from=@$_GET["from"];
$to=@$_GET["to"];
if (empty($from)) {$from='太原';}
if (empty($to)) {$to='休斯敦';}
  $time=time();
 

   $kk=0; 
    
    
print "<h1 align='center'>";
print  "含税 From=".$from."   "."to=".$to."   "."time=".date("Y-m-d",$time);
print "</h1>";

echo "<div align='center'>";
$userMainUrl = "http://flight.qunar.com/site/oneway_list_inter.htm?lowestPrice=1&showTotalPr=1&searchDepartureAirport=".$from."&searchArrivalAirport=".$to."&searchDepartureTime=".date("Y-m-d",$time);

print "<a href=".$userMainUrl.">去哪儿订票</a><br>";
print "<br>";
echo "使用说明：http://huanglan.sinaapp.com/index.php?from=你地址&to=目的地         含税最低票价红色标示  具体订票点击链接  ";
print "<br>";
print "<br>";
echo "</div>";

    
for ($j = 0; $j <= 20; $j++) {

                $timeYMD=date("Y-m-d",$time);
				$url="http://lp.flight.qunar.com/api/lp_calendar?&dep=".$from."&arr=".$to."&dep_date=".$timeYMD."&tax_incl=1";
				$data = file_get_contents($url);//目的页面内容获取
				$obj=json_decode($data,true); 
				$temp=$obj["data"];
				$info=$temp["banner"];

				for ($i = 0; $i <= 6; $i++) 
				{ 
  				  $depDate[$i]=$info[$i]["depDate"];
   				  $price[$i]=$info[$i]["price"];                                                                
   				  $airco[$i]=$info[$i]["airco"];
                    
                       $days[$kk]= $depDate[$i];
                       $jiage[$kk]= $price[$i];
                    //    print "<div id=".$kk.">";
                    $kk=$kk+1;
                    
                    //  print  $depDate[$i]."	".$price[$i]."	". $airco[$i];
                    //  print '<br></div>';
                    
                    
                       
                    
       				} 



$time=strtotime("+7days", $time);


}























$key = array_search(min($jiage),$jiage); 

//echo "<script>";
//echo "document.getElementById('".$key."').style.backgroundColor='red';";  

//echo "</script>";







  $kk=0;
  $time=time();
echo "<div align='center'>";
for ($j = 0; $j <= 20; $j++) {

                $timeYMD=date("Y-m-d",$time);
				$url="http://lp.flight.qunar.com/api/lp_calendar?&dep=".$from."&arr=".$to."&dep_date=".$timeYMD."&tax_incl=1";
				$data = file_get_contents($url);//目的页面内容获取
				$obj=json_decode($data,true); 
				$temp=$obj["data"];
				$info=$temp["banner"];

				for ($i = 0; $i <= 6; $i++) 
				{ 
  				  $depDate[$i]=$info[$i]["depDate"];
   				  $price[$i]=$info[$i]["price"];                                                                
   				  $airco[$i]=$info[$i]["airco"];
                    
                       $days[$kk]= $depDate[$i];
                       $jiage[$kk]= $price[$i];
                    
                      if ($kk==$key){ print "<div id=".$kk."   style='background-color:red'   >";}
                    else {print "<div id=".$kk.">";}
                      
                  
                    $kk=$kk+1;
                    
                     print  $depDate[$i]."	".$price[$i]."	". $airco[$i];
                     print '<br></div>';
                    
                    
                       
                    
       				} 



$time=strtotime("+7days", $time);


}
echo "</div>";


/*
echo "<div align='center'>___________________________________________________________________________________________________________</div>";


echo "<table align='center' border='1'>";



for ($jj = 0; $jj <= count($days); $jj++) {
    $days[$jj];
    if ($jiage[$jj]>500000){
        $jiage[$jj]=0;
      }
    print '<tr><td>'.$days[$jj]."</td><td>".$jiage[$jj]."</td></tr>";

}
    

echo "</table>";

 */



?>

