<?php

	//1.
	class mathx{
		$x;
	}
	//Parse error: syntax error, unexpected '$x' ...
	
	//2.
	class matx{
		public $x;
	}
	//
	
	//3.
	class matx{
		public $x;	
	}
	$x = new matx();
	//
	
	//4.
	class matx{
		public $x;
	}
	$x = new matx2();
	//Fatal error: Uncaught Error: Class 'matx2' ...
	
	//5.
	class matx{
		public $x = 3;
		
		function x(){
			echo 33;	
		}
	}
	$x = new matx();
	echo $x->x;
	echo "<br>";
	$x->x();
	//3
	//33 
	
	//6.
	class matx{
		public $x = 3;
		
		function x(){
			echo $this->x;
		}
	}
	$x = new matx();
	echo $x->x;
	echo "<br>";
	$x->x();
	//3
	//3
	
	//7.
	class matx{
		public $x = 3;
		
		function x($x){
			echo $x;
			echo "<br>";
			echo $this->x;
		}
	}
	$x = new matx();
	$x->x(6);
	//6
	//3
	
	//Магический метод __toString() служит для преобразования объекта в строку.  Он вызывается PHP 
	//автоматически всякий раз, когда мы затребуем неявное преобразование ссылки на объект в строку
	
	//8.
	class matx{
		public $x = 3;
	}
	$x = new matx();
	echo $x;
	//Recoverable fatal error: Object of class matx could not be converted to string
	//Восстановимая фатальная ошибка: объект класса matx не может быть преобразован в строку
	
	//9.
	class matx{
		public $x = 3;
		
		function __toString(){
			echo $this->x;
		}
	}
	$x = new matx();
	echo $x;
	//3
	//Recoverable fatal error: Method matx::__toString() must return a string value
	//Восстановимая фатальная ошибка: метод matx :: __ toString () должен возвращать строковое значение
	
	//10.
	class matx{
		public $x = 3;
		
		function __toString(){
			echo "Строка";
		}
		
	}
	$x = new matx();
	echo $x;
	//Строка
	//Recoverable fatal error: Method matx::__toString() must return a string value
	//Восстановимая фатальная ошибка: метод matx :: __ toString () должен возвращать строковое значение
	
	//11.
	class matx{
		public $x = 3;
		
		function __toString(){
			return "Строка";
		}
		
	}
	$x = new matx();
	echo $x;
	//Строка
	
	//12.
	class matx{
		public $x = 3;
		
		function __toString(){	
			return $this->x;
		}
	}
	$x = new matx();
	echo $x;
	//Recoverable fatal error: Method matx::__toString() must return a string value
	//Восстановимая фатальная ошибка: метод matx :: __ toString () должен возвращать строковое значение
	
	//13.
	class matx{
		public $x = 3;
		
		function __toString(){
			return "$this->x";
		}
	}
	$x = new matx();
	echo $x;
	//3
	
	//14.
	class matx{
		public $x = 3;
		
		function __toString(){
			echo "$this->x";
		}
	}
	$x = new matx();
	echo $x;
	//3
	//Recoverable fatal error: Method matx::__toString() must return a string value
	//Восстановимая фатальная ошибка: метод matx :: __ toString () должен возвращать строковое значение
	
	
	//15.
	class MathComplex1{
		public $re, $im;
		
		function add(MathComplex1 $y){
			$this->re += $y->re;
			$this->im += $y->im;
		}
		
		function __toString(){
				return "({$this->re}, {$this->im})";
		}
	}
	//Явно указали перед параметром $y тип MathComplex1. Это говорит PHP, что мы можем передавать
	//в данную функцию только объекты этого класса, но не другого.
	
	//Например, при попытке указать вместо $y целое число получим ошибку.
	$obj = new MathComplex1;
	$obj->add(1);
	//Fatal error: Uncaught TypeError: Argument 1 passed to MathComplex1::add() must be an instance of 
	//MathComplex1, integer given, called in
	//Fatal error: Uncaught TypeError: аргумент 1, переданный в MathComplex1 :: add (), должен быть экземпляром 
	//MathComplex1, целочисленным заданным, вызываемым в
	
	//Создаем первый объект
	$a = new MathComplex1;
	$a->re = 314;
	$a->im = 101;
	//Создаем второй объект
	$b = new MathComplex1;
	$b->re = 303;
	$b->im = 6;
	//Добавляем одно значение к другому
	$a->add($b);
	//Выводим результат:
	echo $a->__toString(); //(617, 107) 
	
	//16.
	class MathComplex1{
		public $re, $im;
		
		function __construct($im, $re){
			$this->im = $im;
			$this->re = $re;
		}
		
		function add(MathComplex1 $y){
			$this->re += $y->re;
			$this->im += $y->im;
		}
		
		function __toString(){
				return "({$this->re}, {$this->im})";
		}
	}
	
	$a = new MathComplex1(314, 101);
	$a->add(new MathComplex1(303, 6));
	echo $a->__toString();
	//(107, 617) 
	
	//17.
	class mat{
		public $x, $y;
	}
	$obj = new mat();
	$obj->x = 8;
	$obj->y = 6;
	echo "({$obj->x}, {$obj->y})";
	//(8, 6) 
	
	//18.
	class MathComplex1{
		public $re=300, $im=41;
		
		function __toString(){
				return "({$this->re}, {$this->im})";
		}
	}
	$a = new MathComplex1();
	echo $a;
	//(300, 41) 
	
	//19.
	class MathComplex1{
		public $re, $im;
		
		function __construct($re, $im){
			$this->re = $re;
			$this->im = $im;
		}
		
		function __toString(){
				return "({$this->re}, {$this->im})";
		}
	}
	$a = new MathComplex1(303, 606);
	echo $a;
	//(303, 606)
	
	//В отличае от других языков программирования, в PHP у класса может быть только один конструктор
	
	//preg_replace -- Выполняет поиск и замену по регулярному выражению
	//fputs -- Псевдоним функции fwrite()
	//fwrite -- Бинарно-безопасная запись в файл
	
	//20.
	//Класс упрощающий ведение разного рода журналов
	class FileLogger0{
		public $f;//открытый файл
		public $name;//имя журнала
		public $lines = [];//накапливаемые строки
		//Создает новый файл журнала или открывает дозапись в конец существующего.
		//Параметр $name - логическое имя журнала
		public function __construct($name, $fname){
			$this->name = $name;
			$this->f = fopen($fname, "a+");
			//a+ - Открывает файл для чтения и записи; помещает указатель в конец файла. Если файл не 
			//существует - пытается его создать. В данном режиме функция fseek() влияет только на позицию 
			//чтения, записи всегда добавляются в конец.
		}
		//Добавляет в журнал одну строку. Она не попадает в файл сразу же, а накапливается в буфере - до
		//самого закрытия (close()).
		public function log($str){
			//Каждая строка предваряется текущей датой и именем журнала
			$prefix = "[".date("Y-m-d_h:i:s ")."{$this->name}] ";
			//Выполняет поиск (3) совпадений с шаблоном (1) и заменяет на (2)
			$str = preg_replace('/^/m', $prefix, rtrim($str));
			//След. 2 строки это моя замена 1 предыдущей
			//$prefix .= $str;
			//$str = $prefix; 
			//Сохраняем строку
			$this->lines[] = $str."\n";
		}
		//Закрываем файл журнала. Должна ОБЯЗАТЕЛЬНО вызываться в конце работы с объектом!
		public function close(){
			//Вначале выводим все накопленные данные
			fputs($this->f, join("", $this->lines));
			//Затем закрываем файл
			fclose($this->f);
		}
	}
	
	//Создаем в цикле много объектов
	for( $n = 0; $n < 10; $n++ ){
		$logger = new FileLogger0("test$n", "test.log");
		$logger->log("Hello!");
		//Представим, что мы случайно забыли вызвать close()
		$logger->close();
	}
	
	//[2018-08-09_09:20:17 test0] Hello!
	//[2018-08-09_09:20:17 test1] Hello!
	//[2018-08-09_09:20:17 test2] Hello!
	//[2018-08-09_09:20:17 test3] Hello!
	//[2018-08-09_09:20:17 test4] Hello!
	//[2018-08-09_09:20:17 test5] Hello!
	//[2018-08-09_09:20:17 test6] Hello!
	//[2018-08-09_09:20:17 test7] Hello!
	//[2018-08-09_09:20:17 test8] Hello!
	//[2018-08-09_09:20:17 test9] Hello!
	//
	
	//Если забыть вызвать метод close() перед входом в очередную итерацию цикла, то
	//журнал окажется пустым
	
	//21.
	//Класс упрощающий ведение разного рода журналов
	class FileLogger0{
		public $f;//открытый файл
		public $name;//имя журнала
		public $lines = [];//накапливаемые строки
		public $t;
		//Создает новый файл журнала или открывает дозапись в конец существующего.
		//Параметр $name - логическое имя журнала
		public function __construct($name, $fname){
			$this->name = $name;
			$this->f = fopen($fname, "a+");
			//a+ - Открывает файл для чтения и записи; помещает указатель в конец файла. Если файл не 
			//существует - пытается его создать. В данном режиме функция fseek() влияет только на позицию 
			//чтения, записи всегда добавляются в конец.
			$this->log("### __construct() called!");
		}
		//Гарантированно вызывается при уничтожении объекта.
		//Закрывает файл журнала.
		public function __destruct(){
			$this->log("### __destruct() called!");
			//Вначале выводим все накопленные данные
			fputs($this->f, join("", $this->lines));
			//Затем закрываем файл
			fclose($this->f);
		}
		//Добавляет в журнал одну строку. Она не попадает в файл сразу же, а накапливается в буфере - до
		//самого закрытия (close()).
		public function log($str){
			//Каждая строка предваряется текущей датой и именем журнала
			$prefix = "[".date("Y-m-d_h:i:s ")."{$this->name}] ";
			//Выполняет поиск (3) совпадений с шаблоном (1) и заменяет на (2)
			$str = preg_replace('/^/m', $prefix, rtrim($str));
			//След. 2 строки это моя замена 1 предыдущей
			//$prefix .= $str;
			//$str = $prefix; 
			//Сохраняем строку
			$this->lines[] = $str."\n";
		}
	}
	
	//Создаем в цикле много объектов
	for( $n = 0; $n < 10; $n++ ){
		$logger = new FileLogger0("test$n", "test.log");
		$logger->log("Hello!");
		//Теперь нет необходимости заботиться о корректном уничтожении объекта - PHP делает все сам!
	}
	
	//[2018-08-09_09:39:50 test0] Hello!
	//[2018-08-09_09:39:50 test0] ### __destruct() called!
	//[2018-08-09_09:39:50 test1] ### __construct() called!
	//...
	
	//22.
	## Проблемы алгоритма со счетчиком ссылок
	//Класс, обозначающий отца семьи
	class Father{
		//Список детей, сразу после создания объекта - пустой
		public $children = [];
		
		//Выводит сообщение в момент уничтожения объекта
		function __destruct(){
			echo "Father умер.<br>";
		}
	}
	//Ребенок некоторого отца
	class Child{
		//Кто отец этого ребенка?
		public $father;
		
		//Создает нового ребенка (с указанием его отца)
		function __construct(Father $father){
			$this->father = $father;
		}
		
		function __destruct(){
			echo "Child умер.<br>";
		}
	}
	
	//Жил да был Авраам
	$father = new Father;
	//Авраам родил Искака
	$child = new Child($father);
	//... и прописал его на своей жилплощади
	$father->children[] = $child;
	echo "Пока что все живы... Убиваем всех.<br>";
	//Прошло время, и все умерли
	$father = $child = null;
	echo "Все умерли, конец программы.<br>";
	//Но программа говорит, что остались зомби
	
	//Пока что все живы... Убиваем всех.
	//Все умерли, конец программы.
	##Следующие 2 строки идут уже после html кода
	//Father умер.
	//Child умер.
	
	//Это мой эксперимент
	print_r($father->children);
	Array ( [0] => Child Object ( [father] => Father Object ( [children] => Array *RECURSION* ) ) ) 
	
	//Теперь убираем строку
	$father->children[] = $child;
	
	##Теперь все работает как надо
	//Пока что все живы... Убиваем всех.
	//Child умер.
	//Father умер.
	//Все умерли, конец программы.
	
	//23.
	class Station{
		public $exit= 4;
		
		function __destruct(){
			echo "Объект Station уничтожен.<br>";
		}
	}
	
	$theMobilAve = new Station;
	//$theMobilAve->exit = $theMobilAve; //ссылается сам на себя!
	unset($theMobilAve); //объект будет удален
		
	//Объект Station уничтожен.
	
	class Station{
		public $exit;
		
		function __destruct(){
			echo "Объект Station уничтожен.<br>";
		}
	}
	
	$theMobilAve = new Station;
	$theMobilAve->exit = $theMobilAve; //ссылается сам на себя!
	unset($theMobilAve); //объект не будет удален
		
	##Это после всего кода html
	//Объект Station уничтожен.
	##Мы получили объект, который, несмотря на потерю последней ссылки в программе, все равно
	##продолжает существовать в памяти, занимая место, но не будучи доступным.
	
	//Все объекты, генерирующие ссылки, помещаются в специальный буфер, который называется
	//корневым. При заполнении буфера (а его размер составляет 10000) стартует процедура сборки
	//мусора, в результате которой происходит обход дерева всех ссылающихся элементов, алгоритм
	//разрешает циклы и корректирует счетчики. Объекты, чьи счетчики стали равны нулю, удаляются.
	//Механизм довольно ресурсоемок и включается только по заполнению буфера. По умолчанию
	//сборщик мусора включен; если ваши скрипты работают короткое время и потребляют мало
	//памяти, можно увеличить производительность за счет отключения сборщика мусора, установив
	//значение директивы zend.enable_gc в конфигурационном файле php.ini в off

?>