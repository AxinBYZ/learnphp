<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 
//hello world
	/*
	echo "hello world!";
	*/
// php 支持三种注释
	//这是单行注释
	# 这也是单行注释
	/*
	这是多行注释块
	它跨行了
	多行
	 */
//php 大小写敏感
	/*
	在PHP中，所有用户定义的函数，类和关键词（例如 if，else，echo等等）都对大小写不敏感。
	例如这三个echo语句都是合法的（等价）：
	ECHO "Hello world!";
	echo "hello world";
	eCho "hello World";
	**不过在PHP中，所有的变量都是对大小写敏感的。
	$color = "red";
	echo "my car is ".$color."<br>";
	echo "my car is ".$Color."<br>";
	echo "my car is ".$CoLor."<br>";

	*/
//变量
	/*
	php 变量的规则：
		1>变量是$ 符号开头，其后是变量的名称
		2>变量名称必须以字母或下划线开头
		3>变量名称不能以数字开头
		4>变量名称只能包含字母数字字符和下划线（A-z,0-9以及_)
		5>变量名称对大小写敏感
	变量的作用域：
		1>local（局部）
		2>global (全局)
		3>static(静态)
	Local和Global作用域
		函数之外声明的变量拥有Global作用域，只能在函数以外进行访问
		函数内部声明的变量拥有Local作用域，只能在函数内部访问。
		实例：
		$x=5;//全局作用域
		function myTest(){
			$y=10;//局部作用域
			echo "<p>测试函数内部的变量</p>";
			echo "变量x是：$x";
			echo "<br>";
			echo "变量 y 是：$y";
		}
		myTest();
		
		echo "<p>测试函数之外的变量</p>"
		echo "变量 x 是：$x";
		echo "<br>";
		echo "变量 y 是：$x";
	PHP global关键词
		global关键词用于访问函数内部的全局变量。
		要做到这一点，请在（函数内部）变量前使用global关键词：
		实例：
		$x = 5;
		$y = 10;
		function mytest(){
			global $x,$y;
			$y=$x+$y;
		}
		mytest();
		echo $y;//输出15；
		PHP 同时在名为 $GLOBALS[index] 的数组中存储了所有的全局变量。下标存有变量名。这个数组在函数内也可以访问，并能够用于直接更新全局变量。
		上面的例子可以这样重写：
		$x=5;
		$y=10;
		function myTest() {
		  $GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y'];
		} 
		myTest();
		echo $y; // 输出 15
	php static 关键词
		通常，当函数完成/执行后，会删除所有变量。不过，有时我需要不删除某个局部变量。实现这一点需要更进一步的工作。要完成这一点，请在您首次声明变量时使用 static 关键词：
		实例：
		function myTest() {
		  static $x=0;
		  echo $x;
		  $x++;
		}

		myTest();
		myTest();
		myTest();
		每当函数被调用时，这个变量所存储的信息都是函数最后一次被调用时所包含的信息
	*/
//Echo/Print
/*
	两者之间差异
		echo-能够输出一个以上的字符串
		print-只能输出一个字符串，并始终返回-1
		tip: echo 比print 稍快，因为它不返回任何值
	PHP echo语句
		echo 是一个语言结构，有无括号均可使用:echo或echo().
		下面的例子展示如何使用echo命令来显示不同的字符串(同时请注意字符串能包含HTML标记)：
		echo "<h2>PHP is fun!</h2>";
		echo "hello world <br>";
		echo "This","string","was","made","with multiple parameters.";
		下面的例子展示如何用 echo 命令来显示字符串和变量：
		$txt1="Learn PHP";
		$txt2="W3School.com.cn";
		$cars=array("Volvo","BMW","SAAB");

		echo $txt1;
		echo "<br>";
		echo "Study PHP at $txt2";
		echo "My car is a {$cars[0]}";
	PHP Print语句
		print也是语言结构，有无括号均可使用：print 或print();
		下面的例子展示如何用 print 命令来显示不同的字符串（同时请注意字符串中能包含 HTML 标记）：
		print "<h2>PHP is fun!</h2>";
		print "Hello world!<br>";
		print "I'm about to learn PHP!";
		下面的例子展示如何用 print 命令来显示字符串和变量：
		$txt1="Learn PHP";
		$txt2="W3School.com.cn";
		$cars=array("Volvo","BMW","SAAB");

		print $txt1;
		print "<br>";
		print "Study PHP at $txt2";
		print "My car is a {$cars[0]}";
*/
//PHP 数据类型
/*
	字符串，整数，浮点数，逻辑，数组，对象，NULL

	PHP 字符串
	字符串可以是引号内的任何文本，您可以使用单引号或双引号：
	$x = "Hello world!";
	echo $x;
	echo "<br>"; 
	$x = 'Hello world!';
	echo $x;
	PHP整数
		整数规则：
			整数必须有至少一个数字（0-9）
			整数不能包含逗号或空格
			整数不能有小数点
			整数正负均可
			可以用三种格式规定整数：十进制、十六进制（前缀是 0x）或八进制（前缀是 0）
		PHP 的var_dump()会返回变量的数据类型和值
			实例：
			$x = 5985;
			var_dump($x);
			echo "<br>"; 
			$x = -345; // 负数
			var_dump($x);
			echo "<br>"; 
			$x = 0x8C; // 十六进制数
			var_dump($x);
			echo "<br>";
			$x = 047; // 八进制数
			var_dump($x);
	PHP 浮点数
		PHP var_dump() 会返回变量的数据类型和值
			$x = 10.365;
			var_dump($x);
			echo "<br>"; 
			$x = 2.4e3;
			var_dump($x);
			echo "<br>"; 
			$x = 8E-5;
			var_dump($x);
	PHP 逻辑  逻辑是true或者false.
		$x=true;
		$y=false;
	PHP 数组
		$cars = array("BMW","SAAB","Volvo");
		var_dump($cars)
	PHP 对象
		class Car
		{
			var $color;
			function Car($color="green"){
				$this->color = $color;
			}
			function what_color(){
				return $this->color;
			}
		}
	PHP NULL 值
		NULL 值表示变量没有值。NULL 是数据类型为 NULL 的值。
		NULL 值指明一个变量是否为空值。 同样可用于数据空值和NULL值的区别。
		可以通过设置变量值为 NULL 来清空变量数据：
		$x="hello world!";
		$x=null;
		var_dump($x);

*/
//PHP 常量
/*
	定义常量
		define("xiaoming","hello 小明",true)//xiaoming 常量名称 //hello 小明 常量值//true 不区分大小写 false 区分大小写
	常量是全局的
		常量在定义后，默认是全局变量，可以在整个运行的脚本的任何地方使用。
		define("greeting","welcome runoob.com");
		function myTest(){
			echo greeting;
		}
		myTest();
*/

//PHP 字符串变量
/*
	定义字符串变量
		$txt = "hello world!";
		echo $txt;
	PHP 并置运算符
		在PHP中只有一个字符串运算符 .  并置运算符用于把两个字符串值连接起来
		$txt1 = "hello world!";
		$txt2="what a nice day!";
		echo $txt1 . " " .$txt2;
	PHP strlen() 函数  返回字符串值的长度
		echo strlen("hello world")
		strlen() 常常用在循环和其他函数中，因为那时确定字符串何时结束是很重要的。（例如，在循环中，我们需要在字符串中的最后一个字符之后结束循环。）
	PHP strpos() 函数 用于查找一个字符或一段指定的文本。找到返回位置，否则返回false
		echo strpos("hello world","world");
*/
//PHP 运算符
/*
	算数运算符
		$x=10;
		$y=6;
		echo ($x+$y);//16
		echo ($x-$y);//4
		echo ($x*$y);//60
		echo ($x/$y);//1.666666666667
		echo ($x%$y);//4

		PHP7+ 版本新增整除运算符intdiv(),
			var_dump(intdiv(10,3));//3
	复制运算符
		$x=10; 
		echo $x; // 输出10

		$y=20; 
		$y += 100;
		echo $y; // 输出120

		$z=50;
		$z -= 25;
		echo $z; // 输出25

		$i=5;
		$i *= 6;
		echo $i; // 输出30

		$j=10;
		$j /= 5;
		echo $j; // 输出2

		$k=15;
		$k %= 4;
		echo $k; // 输出3
	递增递减运算符
		$x=10; 
		echo ++$x; // 输出11

		$y=10; 
		echo $y++; // 输出10

		$z=5;
		echo --$z; // 输出4

		$i=5;
		echo $i--; // 输出5
	PHP 比较运算符
		$x=100; 
		$y="100";

		var_dump($x == $y);
		echo "<br>";
		var_dump($x === $y);
		echo "<br>";
		var_dump($x != $y);
		echo "<br>";
		var_dump($x !== $y);
		echo "<br>";

		$a=50;
		$b=90;

		var_dump($a > $b);
		echo "<br>";
		var_dump($a < $b);
	PHP数组运算符
		$x = array("a" => "red", "b" => "green"); 
		$y = array("c" => "blue", "d" => "yellow"); 
		$z = $x + $y; // $x 和 $y 数组合并
		var_dump($z);
		var_dump($x == $y);
		var_dump($x === $y);
		var_dump($x != $y);
		var_dump($x <> $y);
		var_dump($x !== $y);
	三元运算符 	? :
		语法格式 ：
			(expr1) ? (expr2) : (expr3) 
			对 expr1 求值为 TRUE 时的值为 expr2，在 expr1 求值为 FALSE 时的值为 expr3
			自 PHP 5.3 起，可以省略三元运算符中间那部分。表达式 expr1 ?: expr3 在 expr1 求值为 TRUE 时返回 expr1，否则返回 expr3
			
			$test = '菜鸟教程';
			// 普通写法
			$username = isset($test) ? $test : 'nobody';
			echo $username, PHP_EOL;

			// PHP 5.3+ 版本写法
			$username = $test ?: 'nobody';
			echo $username, PHP_EOL;
*/
//PHP if...else 语句和Switch语句
/*
	条件语句
		f 语句 - 在条件成立时执行代码
		if...else 语句 - 在条件成立时执行一块代码，条件不成立时执行另一块代码
		if...else if....else 语句 - 在若干条件之一成立时执行一个代码块
		switch 语句 - 在若干条件之一成立时执行一个代码块

	switch (n)
	{
	case label1:
		如果 n=label1，此处代码将执行;
		break;
	case label2:
		如果 n=label2，此处代码将执行;
		break;
	default:
		如果 n 既不等于 label1 也不等于 label2，此处代码将执行;
	}
*/
//数组
/*
	PHP中创建数组 array() 函数用于创建数组
		array();
		在 PHP 中，有三种类型的数组：
			数值数组 - 带有数字 ID 键的数组
			关联数组 - 带有指定的键的数组，每个键关联一个值
			多维数组 - 包含一个或多个数组的数组
	PHP 数值数组
		两种创建数组
			自动分配ID键
			$cars = array("volvo","bmw","toyota");
			人工分配ID键
			$cars[0]="volvo";
			$cars[1]="bmw";
			$cars[2]="toyota";
	获取数组的长度-count()函数
		$cars = array("volvo","bmw","toyota");
		echo count($cars);
		遍历数组
		$arrlength = count($cars);

		for($x=0;$x<$arrlength;$x++){
			echo $cars[$x];
			echo "<br>";
		}
	PHP关联数组
		关联数组是使用您分配给数组的指定的键的数组。
		这里有两种创建关联数组的方法：
			$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
			or:
			$age['Peter']="35";
			$age['Ben']="37";
			$age['Joe']="43";
		遍历关联数组 foreach()循环
			$age = array("peter"=>"35","ben"=>"37",'joe"=>"43');
			foreach($age as $x=>$x_value){
				echo "key=".$x.", value=".$x_value;
				echo "<br>";
			}
*/
//数组排序
/*
	PHP-数组排序函数
		sort() - 对数组进行升序排列
		rsort() - 对数组进行降序排列
		asort() - 根据关联数组的值，对数组进行升序排列
		ksort() - 根据关联数组的键，对数组进行升序排列
		arsort() - 根据关联数组的值，对数组进行降序排列
		krsort() - 根据关联数组的键，对数组进行降序排列	
*/
//超级全局变量
/*
	PHP中预定义的超级全局变量
		$GLOBALS
		$_SERVER
		$_REQUEST
		$_POST
		$_GET
		$_FILES
		$_ENV
		$_COOKIE
		$_SESSION
	$GLOBALS  是PHP的一个超级全局变量组，在一个PHP脚本的全部作用域中都可以访问
	$GLOBALS 是一个包含了全部变量的全局组合数组。变量的名字就是数组的键。
		$x = 75;
		$y = 25;
		function addition(){
			$GLOBALS['z'] = $GLOBALS['x'] +$GLOBALS['y'];
		}
		addition();
		echo $z;
	PHP $_SERVER
		$_SERVER 是一个包含了诸如头信息(header)、路径(path)、以及脚本位置(script locations)等等信息的数组。这个数组中的项目由 Web 服务器创建。不能保证每个服务器都提供全部项目；服务器可能会忽略一些，或者提供一些没有在这里列举出来的项目。
		echo $_SERVER['PHP_SELF'];
		echo "<br>";
		echo $_SERVER['SERVER_NAME'];
		echo "<br>";
		echo $_SERVER['HTTP_HOST'];
		echo "<br>";
		echo $_SERVER['HTTP_REFERER'];
		echo "<br>";
		echo $_SERVER['HTTP_USER_AGENT'];
		echo "<br>";
		echo $_SERVER['SCRIPT_NAME'];
	PHP $_REQUEST
		用于收集HTML表单提交的数据
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		Name: <input type="text" name="fname">
		<input type="submit">
		</form>

		<?php 
		$name = $_REQUEST['fname']; 
		echo $name; 
		?>
	PHP $_POST
		PHP $_POST 被广泛应用于收集表单数据，在HTML form标签的指定该属性："method="post"。
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		Name: <input type="text" name="fname">
		<input type="submit">
		</form>

		<?php 
		$name = $_POST['fname']; 
		echo $name; 
		?>
	PHP $_GET
		PHP $_GET 同样被广泛应用于收集表单数据，在HTML form标签的指定该属性："method="get"。
		$_GET 也可以收集URL中发送的数据。
*/
//PHP 循环
/*
	PHP-循环
		while - 只要指定的条件成立，则循环执行代码块
		do...while - 首先执行一次代码块，然后在指定的条件成立时重复这个循环
		for - 循环执行代码块指定的次数
		foreach - 根据数组中每个元素来循环代码块	
		<?php
		$i=1;
		while($i<=5)
		{
		echo "The number is " . $i . "<br>";
		$i++;
		}
		?>
*/
//PHP 函数
/*
	创建PHP函数
		function functionName(){
			...//要执行的代码
		}
		函数准则：
			函数的名称应该提示出它的功能
			函数名称以字母或下划线开头（不能以数字开头）
			function writeName(){
				echo "Kai Jim Refsnes";
			}
			echo "My name is ";
			writeName();
*/
//PHP 魔术变量
/*
	__LINE__
		文件中的当前行号
		echo "这是第（" . __LINE__ .") 行";
	__FILE__
		文件的完整路径和文件名。如果用在被包含文件中，则返回被包含的文件名
		自 PHP 4.0.2 起，__FILE__ 总是包含一个绝对路径（如果是符号连接，则是解析后的绝对路径），而在此之前的版本有时会包含一个相对路径。
		echo '该文件位于 “ '  . __FILE__ . ' ” ';
	__DIR__
		文件所在的目录。如果用在被包括文件中，则返回被包括的文件所在的目录。
		它等价于 dirname(__FILE__)。除非是根目录，否则目录中名不包括末尾的斜杠。（PHP 5.3.0中新增）
	__FUNCTION__
		函数名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该函数被定义时的名字（区分大小写）。在 PHP 4 中该值总是小写字母的。
		实例:
		function test() {
			echo  '函数名为：' . __FUNCTION__ ;
		}
		test();
	__CLASS__
		类的名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该类被定义时的名字（区分大小写）。
		在 PHP 4 中该值总是小写字母的。类名包括其被声明的作用区域（例如 Foo\Bar）。注意自 PHP 5.4 起 __CLASS__ 对 trait 也起作用。当用在 trait 方法中时，__CLASS__ 是调用 trait 方法的类的名字。
		class test {
			function _print() {
				echo '类名为：'  . __CLASS__ . "<br>";
				echo  '函数名为：' . __FUNCTION__ ;
			}
		}
		$t = new test();
		$t->_print();
	__TRAIT__
		Trait 的名字（PHP 5.4.0 新加）。自 PHP 5.4.0 起，PHP 实现了代码复用的一个方法，称为 traits。
		Trait 名包括其被声明的作用区域
		从基类继承的成员被插入的 SayWorld Trait 中的 MyHelloWorld 方法所覆盖。其行为 MyHelloWorld 类中定义的方法一致。优先顺序是当前类中的方法会覆盖 trait 方法，而 trait 方法又覆盖了基类中的方法。
		class Base {
		    public function sayHello() {
		        echo 'Hello ';
		    }
		}

		trait SayWorld {
		    public function sayHello() {
		        parent::sayHello();
		        echo 'World!';
		    }
		}

		class MyHelloWorld extends Base {
		    use SayWorld;
		}

		$o = new MyHelloWorld();
		$o->sayHello();
	__METHOD__
		类的方法名（PHP 5.0.0 新加）。返回该方法被定义时的名字（区分大小写）
		function test() {
			echo  '函数名为：' . __METHOD__ ;
		}
		test();
	__NAMESPACE__
		当前命名空间的名称（区分大小写）。此常量是在编译时定义的（PHP 5.3.0 新增）。
		namespace MyProject;

		echo '命名空间为："', __NAMESPACE__, '"'; // 输出 "MyProject"
*/
//PHP 命名空间******************************************************？
//PHP 面向对象
/*
	面向对象的内容
		类 − 定义了一件事物的抽象特点。类的定义包含了数据的形式以及对数据的操作。

		对象 − 是类的实例。

		成员变量 − 定义在类内部的变量。该变量的值对外是不可见的，但是可以通过成员函数访问，在类被实例化为对象后，该变量即可称为对象的属性。
		
		成员函数 − 定义在类的内部，可用于访问对象的数据。
		
		继承 − 继承性是子类自动共享父类数据结构和方法的机制，这是类之间的一种关系。在定义和实现一个类的时候，可以在一个已经存在的类的基础之上来进行，把这个已经存在的类所定义的内容作为自己的内容，并加入若干新的内容。
		
		父类 − 一个类被其他类继承，可将该类称为父类，或基类，或超类。
		
		子类 − 一个类继承其他类称为子类，也可称为派生类。
		
		多态 − 多态性是指相同的操作或函数、过程可作用于多种类型的对象上并获得不同的结果。不同的对象，收到同一消息可以产生不同的结果，这种现象称为多态性。
		
		重载 − 简单说，就是函数或者方法有同样的名称，但是参数列表不相同的情形，这样的同名不同参数的函数或者方法之间，互相称之为重载函数或者方法。
		
		抽象性 − 抽象性是指将具有一致的数据结构（属性）和行为（操作）的对象抽象成类。一个类就是这样一种抽象，它反映了与应用有关的重要性质，而忽略其他一些无关内容。任何类的划分都是主观的，但必须与具体的应用有关。
		
		封装 − 封装是指将现实世界中存在的某个客体的属性与行为绑定在一起，并放置在一个逻辑单元内。
		
		构造函数 − 主要用来在创建对象时初始化对象， 即为对象成员变量赋初始值，总与new运算符一起使用在创建对象的语句中。
		
		析构函数 − 析构函数(destructor) 与构造函数相反，当对象结束其生命周期时（例如对象所在的函数已调用完毕），系统自动执行析构函数。析构函数往往用来做"清理善后" 的工作（例如在建立对象时用new开辟了一片内存空间，应在退出前在析构函数中用delete释放）。
	PHP 定义类
		class phpClass {
			var $var1;
			var $var2 = "constant string";

			function myfunc ($arg1,$arg2){
				[...]
			}
			[...]
		}
		解析如下：
			类使用class关键字后加上类名定义
			类名后的一对大括号{}内可以定义变量和方法
			类的变量使用var来声明，变量也可以初始化值
			函数定义类似PHP函数的定义，但函数只能通过该类及其实例化的对象访问
			class Site{
				//成员变量
				var $url;
				var $title;

				//成员函数
				function setUrl($par){
					$this->url = $par;
				}

				function getUrl(){
					echo $this->url .PHP_EOL;
				}

				function getTitle() {
					echo $this->title . PHP_EOL;
				}
			}
	PHP 构造函数
		构造函数是一种特殊的方法，主要用来创建对象时初始化对象，即为对象成员变量赋初始值，总与new运算符一起使用在创建对象的语句中。
		PHP5 允许开发者在一个类中定义一个方法作为构造函数，语法格式如下：
			void __construct ([ mixed $args [,$...]])
			在上面的例子中我们就可以通过构造方法来初始化$url和$title变量:
			class Site {
			  // 成员变量 
			  var $url;
			  var $title;

			  function __construct( $par1, $par2 ) {
			    $this->url = $par1;
			    $this->title = $par2;
			  }
			  // 成员函数 
			  function setUrl($par){
			     $this->url = $par;
			  }
			  
			  function getUrl(){
			     echo $this->url . PHP_EOL;
			  }
			  
			  function setTitle($par){
			     $this->title = $par;
			  }
			  
			  function getTitle(){
			     echo $this->title . PHP_EOL;
			  }
			}

			$runoob = new Site('www.runoob.com', '菜鸟教程');
			$taobao = new Site('www.taobao.com', '淘宝');
			$google = new Site('www.google.com', 'Google 搜索');

			// 调用成员函数，获取标题和URL
			$runoob->getTitle();
			$taobao->getTitle();
			$google->getTitle();

			$runoob->getUrl();
			$taobao->getUrl();
			$google->getUrl();
	//继承
		PHP使用关键字extends来继承一个类，PHP不支持多继承，格式如下
			class Child extends Parent{
				//代码部分
			}
		实例：
			class Child_Site extends Site{
				var $category;
				function setCate($par){
					$this->category = $par;
				}
				function getCate(){
					echo $this->category.PHP_EOL;
				}
			}
	//方法重写
		如果父类继承的方法不能满足子类的需求，可以对其进行改写，这个过程叫方法的覆盖，也成为方法的重写
			function getUrl(){
				echo $this->url.PHP_EOL;
				return $this->url;
			}
			function getTitle(){
				echo $this->title.PHP_EOL;
				return $this->title;
			}
	//访问控制
	 	PHP 对属性或方法的访问控制，是通过在前面添加关键字 public（公有），protected（受保护）或 private（私有）来实现的
	 		public（公有）：公有的类成员可以在任何地方被访问。
			protected（受保护）：受保护的类成员则可以被其自身以及其子类和父类访问。
			private（私有）：私有的类成员则只能被其定义所在的类访问。
	//接口
		使用接口，可以指定某个类必须实现那些方法，但不需要定义这些方法的具体内容
		接口是同过高interface关键字来定义的，就像定义一个标准的类一样，但其中定义所有的方法都是空的。
		接口中定义的所有方法都必须是共有的，这是接口的特性
		要实现一个接口，使用implements操作符，类中必须实现接口中定义的所有方法，否则会报一个致命的错误，类可以实现多个接口，用逗号来分隔多个接口的名称。
			//声明一个“iTemplate”接口
			interface iTemplate
			{
				public function setVariable($name,$val);
				public function getHtml($template);
			}
			//实现接口
			class Template implements iTemplate
			{
				private $vars = array();

				public function setVariable($name,$var){
					$this->vars[$name] = $var;
				}

				public function getHtml($template){
					foreach($this->vars as $name => $value){
						$template = str_replace('{' . $name . '}',$value,$template);
					}
					return $template;
				}
			}
	//常量
		可以把在类中始终保持不变的值定义为常量。在定义和使用常量的时候不需要使用 $ 符号
		常量的值必须是一个定值，不能是变量，类属性，数学运算的结果或函数调用
		自 PHP 5.3.0 起，可以用一个变量来动态调用类。但该变量的值不能为关键字（如 self，parent 或 static）

		class MyClass
		{
		    const constant = '常量值';

		    function showConstant() {
		        echo  self::constant . PHP_EOL;
		    }
		}

		echo MyClass::constant . PHP_EOL;

		$classname = "MyClass";
		echo $classname::constant . PHP_EOL; // 自 5.3.0 起

		$class = new MyClass();
		$class->showConstant();

		echo $class::constant . PHP_EOL; // 自 PHP 5.3.0 起
	//抽象类****************************************？
	//Static 关键字
		声明类属性或方法为 static(静态)，就可以不实例化类而直接访问。
		静态属性不能通过一个类已实例化的对象来访问（但静态方法可以）。
		由于静态方法不需要通过对象即可调用，所以伪变量 $this 在静态方法中不可用。
		静态属性不可以由对象通过 -> 操作符来访问。
		自 PHP 5.3.0 起，可以用一个变量来动态调用类。但该变量的值不能为关键字 self，parent 或 static。
		<?php
		class Foo {
		  public static $my_static = 'foo';
		  
		  public function staticValue() {
		     return self::$my_static;
		  }
		}

		print Foo::$my_static . PHP_EOL;
		$foo = new Foo();

		print $foo->staticValue() . PHP_EOL;
		?>
	//Final 关键字
		PHP 5 新增了一个 final 关键字。如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承
		一下代码会报错:
		<?php
		class BaseClass {
		   public function test() {
		       echo "BaseClass::test() called" . PHP_EOL;
		   }
		   
		   final public function moreTesting() {
		       echo "BaseClass::moreTesting() called"  . PHP_EOL;
		   }
		}

		class ChildClass extends BaseClass {
		   public function moreTesting() {
		       echo "ChildClass::moreTesting() called"  . PHP_EOL;
		   }
		}
		// 报错信息 Fatal error: Cannot override final method BaseClass::moreTesting()
		?>
	//调用父类构造方法
		PHP 不会在子类的构造方法中自动的调用父类的构造方法。要执行父类的构造方法，需要在子类的构造方法中调用 parent::__construct() 。
		<?php
		class BaseClass {
		   function __construct() {
		       print "BaseClass 类中构造方法" . PHP_EOL;
		   }
		}
		class SubClass extends BaseClass {
		   function __construct() {
		       parent::__construct();  // 子类构造方法不能自动调用父类的构造方法
		       print "SubClass 类中构造方法" . PHP_EOL;
		   }
		}
		class OtherSubClass extends BaseClass {
		    // 继承 BaseClass 的构造方法
		}

		// 调用 BaseClass 构造方法
		$obj = new BaseClass();

		// 调用 BaseClass、SubClass 构造方法
		$obj = new SubClass();

		// 调用 BaseClass 构造方法
		$obj = new OtherSubClass();
		?>
*/


















































































?>
</body>
</html>