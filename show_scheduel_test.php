<?php
include "dbconnection.php";
 $weekDayArray = array("Sunday"=>"0","Monday"=>"1", "Tuesday"=>"2", "Wednesday"=>"3","Thursday"=>"4","Friday"=>"5","Saturday"=>"6");
  $date=date('Y-m-d l');
 $weekDay=date('l');
 $weekDayCount=$weekDayArray[$weekDay];
 ?>
 <table class="table table-bordered">
 <?php
 $diffDay=0;
 for($i=$weekDayCount;$i>=1;$i--){
	 $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') - $i , date('Y')));
	 $dateOnly=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - $i , date('Y')));
	 $sql="select * from `schedule` sc where sc.date_col='$dateOnly' and sc.fperiod='AM' order by sc.fhour;";
	 $results=mysql_query($sql);
	 $records=array();
	 while($res=mysql_fetch_array($results)){
	$record=array();
	array_push($record,$res[0]);
	array_push($record,$res[1]);
	array_push($record,$res[2]);
	array_push($record,$res[3]);
	array_push($record,$res[4]);
	array_push($record,$res[5]);
	array_push($record,$res[6]);
	array_push($record,$res[7]);
	array_push($record,$res[8]);
	array_push($record,$res[9]);
	array_push($records,$record);
	 }
 $sql1="select * from `schedule` sc where sc.date_col='$dateOnly' and sc.fperiod='PM' order by sc.fhour";
	 $results1=mysql_query($sql1);
	 $records1=array();
	$middle=array();
	 while($res=mysql_fetch_array($results1)){
	$record=array();
	if($res[3]==12 && $res[5]=='PM'){
		array_push($record,$res[0]);
		array_push($record,$res[1]);
		array_push($record,$res[2]);
		array_push($record,$res[3]);
		array_push($record,$res[4]);
		array_push($record,$res[5]);
		array_push($record,$res[6]);
		array_push($record,$res[7]);
		array_push($record,$res[8]);
		array_push($record,$res[9]);
		array_push($middle,$record);
	}else{
		array_push($record,$res[0]);
		array_push($record,$res[1]);
		array_push($record,$res[2]);
		array_push($record,$res[3]);
		array_push($record,$res[4]);
		array_push($record,$res[5]);
		array_push($record,$res[6]);
		array_push($record,$res[7]);
		array_push($record,$res[8]);
		array_push($record,$res[9]);
		array_push($records1,$record);
	}
}
	$countRecords=count($records);
	$countMiddle=count($middle);
	$countRecords1=count($records1);
	 ?>
<tr style="font-weight:bold;">
			<td>
			<span><?=$date1?></span>
		<input type="hidden" name="" id="" value=""/> 
		<input type="hidden" name="" id="" value=""/> 
			<td><table>
		<tr><td style="background-color:#999;">From</td></tr><tr><td style="background-color:#999;">To</td></tr>
		</table></td>
			</td>
	<?php	
				foreach($records as $r){
					?>
					<td style="background:#999">
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?>
					</td>
					<?php
				}
				foreach($middle as $r){
					?>
					<td style="background:#999">
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?>
					</td>
					<?php
				}
				foreach($records1 as $r){
					?>
					<td style="background:#999">
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?>
					</td>
					<?php
				}
				for($k=0;$k<10-($countRecords+$countRecords1+$countMiddle);$k++){
					?>
					<td style="background:#999">
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<?php
				}
					?>
			</tr>
	
<?php
 }
$count=count($weekDayArray);
$count2=$count-$weekDayCount;
$iCount=0;
for($i=0;$i<$count2;$i++){
 $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));	
 $curr_date=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));	
 $day=date('l', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));	
  $sql="select * from `schedule` sc where sc.date_col='$curr_date' and sc.fperiod='AM' order by sc.fhour";
	 $results=mysql_query($sql);
	 $records=array();
	 while($res=mysql_fetch_array($results)){
	$record=array();
	array_push($record,$res[0]);
	array_push($record,$res[1]);
	array_push($record,$res[2]);
	array_push($record,$res[3]);
	array_push($record,$res[4]);
	array_push($record,$res[5]);
	array_push($record,$res[6]);
	array_push($record,$res[7]);
	array_push($record,$res[8]);
	array_push($record,$res[9]);
	array_push($records,$record);
	 }
	 $sql1="select * from `schedule` sc where sc.date_col='$curr_date' and sc.fperiod='PM' order by sc.fhour";
	 $results1=mysql_query($sql1);
	 $records1=array();
	$middle=array();
	 while($res=mysql_fetch_array($results1)){
	$record=array();
	if($res[3]==12 && $res[5]=='PM'){
		array_push($record,$res[0]);
		array_push($record,$res[1]);
		array_push($record,$res[2]);
		array_push($record,$res[3]);
		array_push($record,$res[4]);
		array_push($record,$res[5]);
		array_push($record,$res[6]);
		array_push($record,$res[7]);
		array_push($record,$res[8]);
		array_push($record,$res[9]);
		array_push($middle,$record);
	}else{
		array_push($record,$res[0]);
		array_push($record,$res[1]);
		array_push($record,$res[2]);
		array_push($record,$res[3]);
		array_push($record,$res[4]);
		array_push($record,$res[5]);
		array_push($record,$res[6]);
		array_push($record,$res[7]);
		array_push($record,$res[8]);
		array_push($record,$res[9]);
		array_push($records1,$record);
	}
}
	$countRecords=count($records);
	$countMiddle=count($middle);
	$countRecords1=count($records1);
  ?>
			<tr style="font-weight:bold;">
			<td>
			<span><?=$date1?></span>
			<input type="hidden" name="date<?=$i?>" id="date<?=$i?>" value="<?=$curr_date?>"/> 
			<input type="hidden" name="day<?=$i?>" id="day<?=$i?>" value="<?=$day?>"/> 
			<td style="background-color:#3D79E6;color:white;font-weight:bold;"><table>
		<tr><td>From</td></tr><tr><td>To</td></tr>
		</table></td>
			</td>		
		<?php
				foreach($records as $r){
					$qry="select * from tutor_schedule2 t where  t.fhours=$r[3] and t.fminutes=$r[4] and t.fperiod='$r[5]' and t.date_day='$curr_date' and t.tutor_id=$user";
					$executeQry=mysql_query($qry);
					$countRec='';
					if($res=mysql_fetch_array($executeQry)){
						$countRec=$res[11];
					}
					?>
					<td style="background:<?php
					
					if($countRec=='Preferred')
						echo 'green';
					else if($countRec=='class')
						echo '#1D1D5F';
					else if($countRec=='cancelReq')
						echo 'red';
					else echo'#3D79E6';
					?>;
					cursor:pointer;color:white;font-weight:bold;" 
					onclick="<?=($countRec=='Preferred' || $countRec=='class')?'':'fixSchedule(this,date'.$i.',day'.$i.');'?>">
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?><br>
					<?php
					if($countRec=='Preferred'||$countRec=='class'){
						?>
							<a href="tutorRequest.php?date=<?=$curr_date?>&time=<?=($r[3]<=9)?"0".$r[3]:$r[3]?>-<?=($r[4]<=9)?"0".$r[4]:$r[4]?>-<?=$r[5]?>-<?=($r[6]<=9)?"0".$r[6]:$r[6]?>-<?=($r[7]<=9)?"0".$r[7]:$r[7]?>-<?=$r[8]?>">cancel</a>
						<?php						
					}
					?>
					</td>
					<?php
				}
				foreach($middle as $r){
					$qry="select * from tutor_schedule2 t where  t.fhours=$r[3] and t.fminutes=$r[4] and t.fperiod='$r[5]' and t.date_day='$curr_date' and t.tutor_id=$user";
					$executeQry=mysql_query($qry);
					$countRec='';
					if($res=mysql_fetch_array($executeQry)){
						$countRec=$res[11];
					}
					?>
					<td style="background:<?php
					
					if($countRec=='Preferred')
						echo 'green';
					else if($countRec=='class')
						echo '#1D1D5F';
					else if($countRec=='cancelReq')
						echo 'red';
					else echo'#3D79E6';
					
					?>;
					cursor:pointer;
					color:white;font-weight:bold;"
					onclick="<?=($countRec=='Preferred' || $countRec=='class')?'':'fixSchedule(this,date'.$i.',day'.$i.');'?>">
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?><br>
					<?php
					if($countRec=='Preferred' || $countRec=='class'){
						?>
							<a href="tutorRequest.php?date=<?=$curr_date?>&time=<?=($r[3]<=9)?"0".$r[3]:$r[3]?>-<?=($r[4]<=9)?"0".$r[4]:$r[4]?>-<?=$r[5]?>-<?=($r[6]<=9)?"0".$r[6]:$r[6]?>-<?=($r[7]<=9)?"0".$r[7]:$r[7]?>-<?=$r[8]?>">cancel</a>
						<?php						
					}
					?>
					</td>
					<?php
				}
				foreach($records1 as $r){
					 $qry="select * from tutor_schedule2 t where  t.fhours=$r[3] and t.fminutes=$r[4] and t.fperiod='$r[5]' and t.date_day='$curr_date' and t.tutor_id=$user";
					$executeQry=mysql_query($qry);
					$countRec='';
					if($res=mysql_fetch_array($executeQry)){
						$countRec=$res[11];
					}
					?>
					<td style="background:<?php
					
					if($countRec=='Preferred')
						echo 'green';
					else if($countRec=='class')
						echo '#1D1D5F';
					else if($countRec=='cancelReq')
						echo 'red';
					else echo'#3D79E6';
					
					?>;
					cursor:pointer;color:white;font-weight:bold;" 
					onclick="<?=($countRec=='Preferred' || $countRec=='class')?'':'fixSchedule(this,date'.$i.',day'.$i.');'?>">
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?><br>
					<?php
					if($countRec=='Preferred' || $countRec=='class'){
						?>
						<a href="tutorRequest.php?date=<?=$curr_date?>&time=<?=($r[3]<=9)?"0".$r[3]:$r[3]?>-<?=($r[4]<=9)?"0".$r[4]:$r[4]?>-<?=$r[5]?>-<?=($r[6]<=9)?"0".$r[6]:$r[6]?>-<?=($r[7]<=9)?"0".$r[7]:$r[7]?>-<?=$r[8]?>">cancel</a>
						<?php						
					}
					?>
					</td>
					<?php
				}
				for($k=0;$k<10-($countRecords+$countRecords1+$countMiddle);$k++){
					?>
					<td style="background:lightblue;">
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<?php
				}
					?>				
			</tr>
			<?php
$iCount++;
$diffDay++;
 }
?>
<input type="hidden" name="icount" value="<?=$iCount?>"/> 
<tr>
</table>
<a href="show_next_schedule.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') +$diffDay , date('Y')));?>" class="btn btn-primary" style="float:right;  font-size:20px; padding: 4px 12px; margin-right:30px">next >></a><br><br>
<script>
function fixSchedule(id,dat,day){
	if(id.style.background=='#1D1D5F'){
		 
	}else{
	var str=id.innerHTML;
	var strArr1=str.split('<br>');
	var strArr2=strArr1[0].split('&nbsp;&nbsp;');
	var fperiod=strArr2[1].trim();
	var strArr3=strArr2[0].split(':');
	var fhour=strArr3[0].trim();
	var fminutes=strArr3[1].trim();
	
	
	 strArr2=strArr1[1].split('&nbsp;&nbsp;');
	var tperiod=strArr2[1].trim();
	strArr3=strArr2[0].split(':');
	var thour=strArr3[0].trim();
	var tminutes=strArr3[1].trim();
	
	var queryString='?fhour='+fhour+'&fminutes='+fminutes+'&fperiod='+fperiod+'&thour='+thour+'&tminutes='+tminutes+'&tperiod='+tperiod+'&date='+dat.value+'&day='+day.value;
	 var c=confirm("Do you want to confirm these timings..!");
    if(c){
     sendConformation(queryString,id); 
    }
    window.location='test.php';
	}
}
function sendConformation(query,id){
  var xhttp;
  if (window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
    } else {
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var result = xhttp.responseText;
	   if(result=='success'){
		 id.style.background="#1D1D5F";
		 id.style.color="white";
		 id.style.fontWeight="bold";
	 }else{
		 alert("sorry due to some problem we are unable to process your request...!");
	 }
    }
  };
  var url="fixSchedule.php"+query;
  xhttp.open("GET", url, true);
  xhttp.send();
}
</script>
