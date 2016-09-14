<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>9-13learnphp</title>
</head>
<body>

<?php 
//表单和用户输入
/*
	//表单处理
		<form action="welcome.php" method="post">
		名字: <input type="text" name="fname">
		年龄: <input type="text" name="age">
		<input type="submit" value="提交">
		</form>
		welcome.php文件如下:
			欢迎<?php echo $_POST['fname']; ?><br>
			你的年龄是 <?php echo $_POST['age']; ?>岁。

	//表单验证
		应该在任何可能的时候对用户输入进行验证（通过客户端脚本）。浏览器验证速度更快，并且可以减轻服务器的负载。如果用户输入需要插入数据库，您可以考虑使用服务器验证。在服务器验证表单的一种好的方式是，把表单传给它自己，而不是跳转到不同的页面，这样用户就可以在同一张表单页面得到错误信息。用户也就更容易发现错误了。
		在处理PHP表单时我们需要考虑安全性，为防止黑客及垃圾信息我们需要对表单进行数据安全验证。
		<body> 

			<?php
			// 定义变量并默认设置为空值
			$nameErr = $emailErr = $genderErr = $websiteErr = "";
			$name = $email = $gender = $comment = $website = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
			    if (empty($_POST["name"]))
			    {
			        $nameErr = "名字是必需的";
			    }
			    else
			    {
			        $name = test_input($_POST["name"]);
			        // 检测名字是否只包含字母跟空格
			        if (!preg_match("/^[a-zA-Z ]*$/",$name))
			        {
			            $nameErr = "只允许字母和空格"; 
			        }
			    }
			    
			    if (empty($_POST["email"]))
			    {
			      $emailErr = "邮箱是必需的";
			    }
			    else
			    {
			        $email = test_input($_POST["email"]);
			        // 检测邮箱是否合法
			        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
			        {
			            $emailErr = "非法邮箱格式"; 
			        }
			    }
			    
			    if (empty($_POST["website"]))
			    {
			        $website = "";
			    }
			    else
			    {
			        $website = test_input($_POST["website"]);
			        // 检测 URL 地址是否合法
			        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
			        {
			            $websiteErr = "非法的 URL 的地址"; 
			        }
			    }
			    
			    if (empty($_POST["comment"]))
			    {
			        $comment = "";
			    }
			    else
			    {
			        $comment = test_input($_POST["comment"]);
			    }
			    
			    if (empty($_POST["gender"]))
			    {
			        $genderErr = "性别是必需的";
			    }
			    else
			    {
			        $gender = test_input($_POST["gender"]);
			    }
			}

			function test_input($data)
			{
			    $data = trim($data);
			    $data = stripslashes($data);
			    $data = htmlspecialchars($data);
			    return $data;
			}
			?>

			<h2>PHP 表单验证实例</h2>
			<p><span class="error">* 必需字段。</span></p>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
			   名字: <input type="text" name="name" value="<?php echo $name;?>">
			   <span class="error">* <?php echo $nameErr;?></span>
			   <br><br>
			   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
			   <span class="error">* <?php echo $emailErr;?></span>
			   <br><br>
			   网址: <input type="text" name="website" value="<?php echo $website;?>">
			   <span class="error"><?php echo $websiteErr;?></span>
			   <br><br>
			   备注: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
			   <br><br>
			   性别:
			   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">女
			   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">男
			   <span class="error">* <?php echo $genderErr;?></span>
			   <br><br>
			   <input type="submit" name="submit" value="Submit"> 
			</form>

			<?php
			echo "<h2>您输入的内容是:</h2>";
			echo $name;
			echo "<br>";
			echo $email;
			echo "<br>";
			echo $website;
			echo "<br>";
			echo $comment;
			echo "<br>";
			echo $gender;
			?>
		</body>
		$_SERVER["PHP_SELF"]是超级全局变量，返回当前正在执行脚本的文件名，与document root相关。
		htmlspecialchars()函数把一些预定义的字符转换为HTML实体。预定义的字符包括：
			& （和号）成为 &amp;
			"   （双引号）成为&quot;
			'   （单引号）成为&#039；
			<   （小于号）成为&lt;
			>  （大于号）成为 &gt;
	//PHP表单中需要引起注意的地方
		$_SERVER["PHP_SELF"]变量有可能会被黑客使用！！！
		当黑客使用跨网站脚本的HTTP链接来攻击时，$_SERVER["PHP_SELF"]服务器变量也会被植入脚本。原因就是跨网站脚本是附在执行文件的路径后面的，因此$_SERVER["PHP_SELF"]的字符串就会包含HTTP链接后面的JavaScript程序代码。
		XSS又叫 CSS (Cross-Site Script) ,跨站脚本攻击。恶意攻击者往Web页面里插入恶意html代码，当用户浏览该页之时，嵌入其中Web里面的html代码会被执行，从而达到恶意用户的特殊目的。
	//如何避免$_SERVER["PHP_SELF"]被利用？
		$_SERVER["PHP_SELF"] 可以通过 htmlspecialchars() 函数来避免被利用
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	//使用PHP验证表单数据
		首先我们对用户所有提交的数据都通过 PHP 的 htmlspecialchars() 函数处理。
		当我们使用 htmlspecialchars() 函数时，在用户尝试提交以下文本域:
		<script>location.href('http://www.runoob.com')</script>
		该代码将不会被执行，因为它会被保存为HTML转义代码，如下所示：
		&lt;script&gt;location.href('http://www.runoob.com')&lt;/script&gt;
		以上代码是安全的，可以正常在页面显示或者插入邮件中。
		当用户提交表单时，我们将做以下两件事情，：
			使用 PHP trim() 函数去除用户输入数据中不必要的字符 (如：空格，tab，换行)。
			使用PHP stripslashes()函数去除用户输入数据中的反斜杠 (\)
			接下来让我们将这些过滤的函数写在一个我们自己定义的函数中，这样可以大大提高代码的复用性。
			将函数命名为 test_input()。
*/	
//PHP date()函数
/*
	PHP date()函数用于格式化时间/日期
		它可以把时间戳格式化为可读性更好的日期和时间
		时间戳是一个字符序列，表示一定的事件发生的日期/时间。
		语法：
			echo date("Y/m/d");
*/
//PHP 包含文件
/*
	PHP include和require语句
		在PHP中，您可以在服务器执行PHP文件之前在该文件中插入一个文件得内容。
		include和require语句用于在执行流中插入写在其它文件中的有用的代码
		include和require除了处理错误的方式不同之外，在其他方面都是相同的：
			require 生成一个致命错误（E_COMPILE_ERROR ）,在错误发生后脚本会停止执行。
			include生成一个警告（E_WARNING），在错误发生后脚本会继续执行。
		因此，如果您希望继续执行，并向用户输出结果，即使包含文件已丢失，那么请使用include。否则，在框架、CMS 或者复杂的 PHP 应用程序编程中，请始终使用 require 向执行流引用关键文件。这有助于提高应用程序的安全性和完整性，在某个关键文件意外丢失的情况下。
		包含文件省去了大量的工作。这意味着您可以为所有网页创建标准页头、页脚或者菜单文件。然后，在页头需要更新时，您只需更新这个页头包含文件即可。
		语法：
			include "filename";
			或者
			require "filename";
		基础实例：
			假设您有一个标准的页头文件，名为"header.php".如需在页面中引用这个页头文件，请使用include/require;
			<html>
				<head>
					<meta charset="utf-8">
					<title>菜鸟教程(runoob.com)</title>
				</head>
				<body>
					<?php include 'header.php'; ?>
					<h1>欢迎来到我的主页!</h1>
					<p>一些文本。</p>
				</body>
			</html>
		实例2:
			假设我们有一个在所有页面使用的标准菜单文件。
			"menu.php":
				echo '<a href="/">主页</a>
				<a href="/html">HTML教程</a>
				<a href = href="/php">PHP 教程</a>';
			网站中的所有页面均应引用该菜单文件，以下是具体的做法：
				<html>
					<head>
						<meta charset="utf-8">
						<title>菜鸟教程(runoob.com)</title>
					</head>
					<body>
						<div class="leftmenu">
						<?php include 'menu.php'; ?>
						</div>
						<h1>欢迎来到我的主页!</h1>
						<p>一些文本。</p>
					</body>
				</html>
			实例3
			假设我们有一个定义变量的包含文件("vars.php")：
				<?php
					$color = 'red';
					$car = "BMW";
				?>
			这些变量可用在调用文件中：
				<html>
					<head>
						<meta charset="utf-8">
						<title>菜鸟教程(runoob.com)</title>
					</head>
					<body>
						<h1>欢迎来到我的主页!</h1>
						<?php 
						include 'vars.php';
						echo "I have a $color $car"; // I have a red BMW
						?>
					</body>
				</html>
*/
//PHP 文件处理
/*
	PHP fopen()函数用于在PHP中打开文件。
		此函数的第一个参数含有要打开的文件的名称，第二个参数规定了使用那种模式来打开文件：
		<html>
		<body>
			<?php
			$file=fopen("welcome.txt","r");
			?>
		</body>
		</html>
		r 		只读。在文件的开头开始
		r+ 		读/写。在文件的开头开始
		w 		只写。打开并清空文件的内容；如果文件不存在，则创新文件
		w+		读/写。打开并清空文件的内容；如果文件不存在，则创建新文件。
		a 		追加。打开并向文件末尾进行写操作，如果文件不存在，则创建新文件。
		a+ 		读/追加。通过向文件末尾写内容，来保持文件内容。
		x 		只写。创建新文件。如果文件已存在，则返回false和一个错误。
		x+		读/写。创建新文件。如果文件已存在，则返回false和一个错误。
		注释：如果fopen()函数无法打开指定文件，则返回0 (false);
	关闭文件 fclose() 函数用于关闭打开的文件：
		<?php 
		$file = fopen("welcome.txt",r);
		//执行一些代码
		fclose($file);
		?>
	检测文件末尾（EOF）
		feof()函数检测是否已到达文件末尾（EOF )。
		在循环遍历未知长度的数据时，feof()函数很有用。
		注释：在w、a和x模式下，您无法读取打开的文件!
		if(feof($file)) echo "文件结尾";
	逐行读取文件
		fgets()函数用于从文件中逐行读取文件
		注释：在调用该函数之后，文件指针会移动到下一行。
		实例：
			<?php
			$file = fopen("welcome.txt","r") or exit("无法打开文件！");
			//读取文件每一行，知道文件结尾
			while(!feof($file)){
				echo fgets($file)."<br>";
			}
			fclose($file);
			?>
	逐字符读取文件
		fgetc()函数用于从文件中逐字符读取文件
		注释：在调用该函数之后，文件指针会移动到下一个字符。
		实例：
			下面的实例逐字符地读取文件，直到文件末尾为止；
			<?php 
				$file = fopen("welcome.txt","r") or exit("无法打开文件!");
				while(!feof($file)){
					echo fgetc($file);
				}
				fclose($file);
			?>
*/



?>
</body>
</html>