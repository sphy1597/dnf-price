<?php
$mysql_hostname = 'localhost';
$mysql_username = '아이디';
$mysql_password = '비밀번호';
$mysql_database = '디비이름';
$mysql_charset = 'utf8';

$connect = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);
mysqli_query($connect,"set names utf8"); //UTF-8로 데이터 변경 (한글 깨짐 처리)
if($connect->connect_errno){
	echo '[연결실패] : '.$connect->connect_error.''; 
} else {
	echo '[연결성공]<br>';
}

//2. 문자셋 지정
if(! $connect->set_charset($mysql_charset))
{
	echo '[문자열변경오류] : '.$connect->connect_error;
}
 
    $scoreQuery = mysqli_query($connect,"SELECT * FROM classinfo where Name = \"웨펀마스터\" ")
	or die(mysqli_error($connect));;
          
   $i = 0;
   while($row = mysqli_fetch_array($scoreQuery)) {
    $i++;
    echo ": class : ".$row['Name']." - 스탯 : ".$row['Stat']." - 물마독 : ".$row['DamageType']."<br />\n";
   }

   
	echo "<br> <a href='index.html'> 홈으로 </a> ";
?>
