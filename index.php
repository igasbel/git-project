<?php
	require_once "inclusion/header.php";
	//require_once "http://206school/inclusion/header.php";
	
/* echo(ini_get("allow_url_include") . "<br />");

   ini_set('post_max_size', '200M');

    echo(ini_get("post_max_size"));

	phpinfo(); */
?>
<div class='main'>

<?php

	//Адрес сервера баз данных, а также имя базы данных
    define("DB_DSN", "mysql:host=localhost;dbname=astra");
    //Логин для соединения с сервером баз данных mySQL
    define("DB_USERNAME", "root");
    //Пароль для соединения с сервером баз данных mySQL
    define("DB_PASSWORD", "");
	
	/* $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$sql = "SELECT SQL_CALC_FOUND_ROWS title, SUM(price) FROM `luki` WHERE price BETWEEN 5000 AND 6000 GROUP BY title WITH ROLLUP";
	$result_sql = $conn->query($sql);
	$sql_1 = "SELECT FOUND_ROWS() AS all_sections";
	$all_sections = $conn->query($sql_1)->fetch(PDO::FETCH_ASSOC);
	echo "<strong>Всего товаров: ".$all_sections = $all_sections['all_sections']."</strong><br><br>";
	
	while($result = $result_sql->fetch(PDO::FETCH_ASSOC)){
		echo $result['SUM(price)']."<br>";
		//print_r($result);
	}  */
	
	
	//include("$i.php");
	//include('test.php');
	//require("$i.php");
	//require('test.php');

	//echo $_SERVER['REMOTE_ADDR'];//IP посетителя
	//echo $_SERVER['SERVER_ADDR'];//IP сервера
	trait someTrait {
	public function doStuff(){
		echo "Метод doStuff трейта someTrait";
	}
}

class someClass {
	use someTrait;
}

someClass::doStuff();
	
	?>
	
	
	

</div>

<?php
	require_once "inclusion/footer.php";
?>