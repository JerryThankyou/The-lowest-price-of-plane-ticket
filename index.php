<?
//#userMainUrl = "http://flight.qunar.com/site/oneway_list_inter.htm?lowestPrice=1&showTotalPr=1&searchDepartureAirport=̫ԭ&searchArrivalAirport=IAH&searchDepartureTime=2015-06-06";
//#userMainUrl = http://lp.flight.qunar.com/api/lp_calendar?&dep=̫ԭ&arr=��˹��&dep_date=2015-06-08
header("Content-type: text/html; charset=utf-8"); 
$from=@$_GET["from"];
$to=@$_GET["to"];
if (empty($from)) {$from='̫ԭ';}
if (empty($to)) {$to='��˹��';}
  $time=time();
 

   $kk=0; 
    
    
print "<h1 align='center'>";
print  "��˰ From=".$from."   "."to=".$to."   "."time=".date("Y-m-d",$time);
print "</h1>";

echo "<div align='center'>";
$userMainUrl = "http://flight.qunar.com/site/oneway_list_inter.htm?lowestPrice=1&showTotalPr=1&searchDepartureAirport=".$from."&searchArrivalAirport=".$to."&searchDepartureTime=".date("Y-m-d",$time);

print "<a href=".$userMainUrl.">ȥ�Ķ���Ʊ</a><br>";
print "<br>";
echo "ʹ��˵����http://huanglan.sinaapp.com/index.php?from=���ַ&to=Ŀ�ĵ�         ��˰���Ʊ�ۺ�ɫ��ʾ  ���嶩Ʊ�������  ";
print "<br>";
print "<br>";
echo "</div>";

    
for ($j = 0; $j <= 20; $j++) {

                $timeYMD=date("Y-m-d",$time);
				$url="http://lp.flight.qunar.com/api/lp_calendar?&dep=".$from."&arr=".$to."&dep_date=".$timeYMD."&tax_incl=1";
				$data = file_get_contents($url);//Ŀ��ҳ�����ݻ�ȡ
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
				$data = file_get_contents($url);//Ŀ��ҳ�����ݻ�ȡ
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

