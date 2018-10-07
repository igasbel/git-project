<?php
	//Проверка поискового текста
	function check_search($value){
		//Удаление пробелов из начала и конца строки
		$value = trim($value);
		//Сокращение пробелов до одного между двумя словами
		$value =  preg_replace('/ {2,}/', ' ', $value);
		//Экранирование символов
		$value = addslashes($value);
		//Приводим все к нижнему регистру
		$value = mb_strtolower($value, 'utf-8');
		//Убераем пробелы от дефиса
		$value = str_replace(' - ', '-', $value);
		$value = str_replace(' -', '-', $value);
		$value = str_replace('- ', '-', $value);
		//Удаления HTML и PHP тегов
		$value = strip_tags($value);
		//Удаление любых символов, кроме пробела, звездочки и дефиса, ^ - этот знак и обозначает, все кроме
		$value = preg_replace("/[^\-* а-яёА-ЯЁa-zA-Z0-9]/u", "", $value);
		return $value;
	}

    //Проверка текстовых данных (ФИО, e-mail, телефон, комментарий)
    function check_text($value){
        //Удаление пробелов из начала и конца строки
		$value = trim($value);
		//Сокращение пробелов до одного между двумя словами
		$value = preg_replace('/ {2,}/', ' ', $value);
		//Удаления HTML и PHP тегов
		$value = strip_tags($value);
        //Экранирование символов
		$value = addslashes($value);
        return $value;
	}

    //Проверка на правильность e-mail (на сервере уже неи надобности проверять на корректность, дабы не перегружать сервер и чтобы не возникло противоречий с js, потому как если будут разниться проверка на php и js в программе произойдет сбой)
	function email_check($email){
		if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)){
			return false;
		}else 
		return $email;
	}

    //Проверка на правильность телефона (на сервере уже неи надобности проверять на корректность, дабы не перегружать сервер и чтобы не возникло противоречий с js, потому как если будут разниться проверка на php и js в программе произойдет сбой)
	function check_phone_number($phoneNumber){
		//Удаляем пробелы, и прочие ненужные знаки, чтобы сравнить цифры
		$phoneNumber_num = preg_replace('/\s|\+|-|\(|\)/','', $phoneNumber);
		//Удаления HTML и PHP тегов
		//$phoneNumber = strip_tags($phoneNumber);
		if(is_numeric($phoneNumber_num)){
			//Если длина номера слишком короткая, вернем false 
			if(strlen($phoneNumber_num) < 5){
				return false;
			}else{
				return $phoneNumber;			
			}
		}else{
			return false;
		}
	}
?>