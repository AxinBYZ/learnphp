<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 
	//PHP Cookie
	/*
		1.Cookie 是什么
			cookie 常用于识别用户，cookie是一种服务器留在用户计算机上的小文件，
			每当同一台计算机通过浏览器请求页面时，这台计算机将会发送cookie，通过PHP，您能够创建并取回cookie的值。
		2.创建cookie
			setcookie()函数用于设置cookie.
				注释：setcookie()函数必须位于<html>标签之前。
				setcookie(name,value,expire,path,domain);
			实例一：
				创建名为"user"的cookie，并为它赋值"runoob".我们也规定了此cookie在一个小时后过期：
				<?php
					setcookie("user","runoob",time()+3600);
				?>

				<html>
				......
			注意：在发送cookie时，cookie的值会自动进行URL编码，在取回时进行自动解码。（为防止URL编码，请使用setrawcookie()取而代之。）
			实例2
				还可以通过另一种方式设置cookie的过期时间，这也许比使用秒表示的方式简单。
				<?php 
					$expire = time() + 60*60*24*30;//过期时间为一个月
					setcookie("user","runoob",$expire);
				?>
				<html>
				......
		3.如何取回cookie的值？
			PHP的$_COOKIE 变量用于取回cookie的值
			在下面的实例中，我们取回了名为"user"的cookie的值，并把它显示在了页面上：
			<?php
				//输出cookie值
				echo $_COOKIE["user"];
				//查看所有cookie
				print_r($_COOKIE);
			?>
			在下面的例子中，我们使用isset()函数确认是否已设置了cookie:
			<?php 
			if(isset($_COOKIE["user"]))
				echo "欢迎".$_COOKIE["user"]."!<br>";
			else
				echo "普通游客！<br>";
		4.删除cookie
			当删除cookie时，您应当使过期日期变更为过去的时间点。
			删除的实例：
				<?php 
					//设置cookie过期时间为过去1小时
					setcookie("user","",time()-3600);	
	*/
	//PHP Session
	/*
		1.PHP Session 变量
			该变量用于存储关于用户回话（session）的信息，或者更改用户回话（session）的设置，Session变量存储单一用户的信息，并且对于应用程序中的所有页面都是可用的。
			您在计算机上操作某个应用程序时，您打开它，做些更改，然后关闭它。这很像一次对话（Session）。计算机知道您是谁，他知道您在何时打开和关闭应用程序，然而，在因特网上问题出现了：由于HTTP地址无法保持状态，Web服务器并不知道您是谁以及您做了什么。
			PHP Session 解决了这个问题，它通过在服务器上存储用户信息以便随后使用（比如用户名称，购买的商品等）。然而，会话信息是临时的，在用户离开网站后将被删除。如果您需要永久存储信息，可以把数据存储在数据库中。
			Session的工作机制是：为每个访客创建一个唯一的id(UID),并基于这个UID来存储变量。UID存储在cookie中，或者通过URL进行传导。
		2.开始 PHP Session
			在您把用户信息存储到PHP session中之前，首先必须启动对话。
			注释：session_start()函数必须位于<html>标签之前
			<?php session_start(); ?>
			<html>
			........
			上面的代码会向服务器注册用户的回话，以便您可以开始保存用户信息，同时会为用户回话分配一个UID.
		3.存储Session变量
			存储和取回session变量的正确方法是使用PHP $_SEEION变量：
			<?php 
				session_start();
				//存储session 数据
				$_SESSION['views']=1;
			?>
			<html>
				<head>
				<meta chartset="utf-8">
				<title>菜鸟教程（runoob.com）</title>
				</head>
				<body>
					<?php 
						//检索session数据
						echo "浏览量：".$_SESSION['views'];
					?>
				</body>
			</html>
			在下面的实例中，我们创建了一个简单的 page-view 计数器。isset() 函数检测是否已设置 "views" 变量。如果已设置 "views" 变量，我们累加计数器。如果 "views" 不存在，则创建 "views" 变量，并把它设置为 1：
			<?php
			session_start();
			if(isset($_SESSION['views']))
			{
				$_SESSION['views']=$_SESSION['views']+1;
			}
			else
			{
				$_SESSION['views']=1;
			}
			echo "浏览量：". $_SESSION['views'];
			?>
		4.销毁Session
			如果您希望删除某些session数据，可以试用unset()或session_destroy()函数。
			unset()函数用于释放指定的session变量：
				<?php 
					session_start();
					if(isset($_SESSION['views']))
					{
						unset($_SESSION['views']);
					}
				?>
			您也可以通过调用 session_destroy() 函数彻底销毁 session：
			<?php
			session_destroy();
			?>
			注释：session_destroy() 将重置 session，您将失去所有已存储的 session 数据。
	*/
	//PHP 发送电子邮件
	/*
		1.PHP mail()函数
			mail()函数用于从脚本中发送电子邮件。
			语法: mail(to,subject,message,headers,parameters)
			to 			必需。规定email接受者。
			subject 	必需。规定email的主题。注释：该参数不能包含任何新行字符。
			message 	必需。定义要发送的信息。应使用LF(\n)来分隔各行。每行应该限制在70个字符内。
			headers 	可选。规定附加的标题，比如From，Cc和Bcc。应当使用CRLF(\r\n)分隔附加的标题。
			parameters  可选。对邮件发送程序规定额外的参数。

			注释：PHP 运行邮件函数需要一个已安装且正在运行的邮件系统（如：sendmail,postfix,qmail等）。所用的程序通过在php.ini文件中的配置设置进行定义。
		2.PHP 简易E-Mail
			通过PHP发送电子邮件的最简单的方式是发送一封文本email。
			在下面的实例中，我们首先声明变量（$to,$subject,$message,$from,$headers),然后我们在mail()函数中使用这些变量来发送了一封E-mail.
			<?php
				$to = "someone@example.com";//邮件接受者
				$subject = "参数邮件";	//邮件标题
				$message = "Hello! 这是邮件内容。";//邮件正文
				$from = "someonelse@example.com";//邮件发送者
				$headers="From:" . $from;
				mail($to,$subject,$message,$headers);
				echo"邮件已发送";
			?>
		3.PHP Mail表单
			通过PHP，您能够在自己的站点制作一个反馈表单
				<html>
				<head>
				<meta charset="utf-8">
				<title>菜鸟教程(runoob.com)</title>
				</head>
				<body>

				<?php
				if (isset($_REQUEST['email'])) { // 如果接收到邮箱参数则发送邮件
					// 发送邮件
					$email = $_REQUEST['email'] ;
					$subject = $_REQUEST['subject'] ;
					$message = $_REQUEST['message'] ;
					mail("someone@example.com", $subject,
					$message, "From:" . $email);
					echo "邮件发送成功";
				} else { // 如果没有邮箱参数则显示表单
					echo "<form method='post' action='mailform.php'>
					Email: <input name='email' type='text'><br>
					Subject: <input name='subject' type='text'><br>
					Message:<br>
					<textarea name='message' rows='15' cols='40'>
					</textarea><br>
					<input type='submit'>
					</form>";
				}
				?>

				</body>
				</html>

				实例解释：
					首先，检查是否填写了邮件输入框
					如果未填写（比如在页面首次访问时），输出HTML表单
					如果已经填写，从表单发送电子邮件
					当填写完表单点击提交按钮后，页面重新载入，可以看到邮件输入被重置。
				注释：这个简易发送 e-mail 不安全，在本教程的下一章中，您将阅读到更多关于电子邮件脚本中的安全隐患，我们将为您讲解如何验证用户输入使它更安全。
		4.安全E-mail
			？？？
	*/
	//PHP Error
	/*
		1.PHP 错误处理
			在PHP中，默认的错误处理很简单，一条错误消息会被发送到浏览器，这条消息带有文件名，行号以及描述错误的消息。
			在创建脚本和web应用程序时，错误处理是一个重要的部分，如果您的代码缺少错误检测编码，那么程序看上去很不专业，也为安全风险敞开了大门。
			不同的错误处理方法：
				简单的"die()"语句
				自定义错误和错误触发器
				错误报告
		2.基本的错误处理：使用die()函数
			一个打开文本文件得简单脚本
				<?php 
				$file = fopen("welcome.text","r");
				?>
			如果文件不存在，您会得到类似这样的错误：
				Warning: fopen(welcome.txt) [function.fopen]: failed to open stream:
				No such file or directory in /www/runoob/test/test.php on line 2
			为了避免用户得到类似上面的错误信息，我们在访问文件之前检测该文件是否存在：
				<?php
				if(!file_exists("welcome.txt"))
				{
					die("文件不存在")；
				}
				else
				{
					$file=fopen("welcome.txt","r");
				}
			现在，如果文件不存在，您会得到类似这样的错误信息：
				文件不存在
			先比之前的代码，上面代码更有效，这是由于它采用了一个简单的错误处理机制在错误之后终止了脚本。然而，简单地终止脚本并不总是恰当的方式，让我们研究一下用于处理错误的备选的PHP函数。
		3.创建自定义错误处理器
			创建一个自定义的错误处理器非常简单，我们很简单地创建了一个专用函数，可以在PHP中发生错误时调用该函数。
			该函数必须有能力处理至少两个参数 (error level 和 error message)，但是可以接受最多五个参数（可选的：file, line-number 和 error context）：
			语法：
				error_function(error_level,error_message,
				error_file,error_line,error_context)
				error_level			必需。为用户定义的错误规定错误报告级别。必须是一个数字。参见下面的表格：错误报告级别	
				error_message 		必需。为用户定义的错误规定错误消息。
				error_file 			可选。规定错误发生的文件名。
				error_line 			可选。规定错误发生的行号。
				error_context		可选。规定一个数组，包含了当错误发生时在用的每个变量以及它们的值。
		4.错误报告级别
			这些错误报告级别是用户自定义的错误处理程序处理的不同类型的错误：
			值			常量						描述
			2			E_WARNING				非致命的 run-time 错误。不暂停脚本执行
			8			E_NOTICE					run-time 通知。在脚本发现可能有错误时发生，但也可能在脚本正常运行时发生。
			256			E_USER_ERROR				致命的用户生成的错误。这类似于程序员使用 PHP 函数 trigger_error() 设置的 E_ERROR
			512			E_USER_WARNING			非致命的用户生成的警告。这类似于程序员使用 PHP 函数 trigger_error() 设置的 E_WARNING
			1024		E_USER_NOTICE			用户生成的通知。这类似于程序员使用 PHP 函数 trigger_error() 设置的 E_NOTICE。
			4096		E_RECOVERABLE_ERROR	可捕获的致命错误。类似 E_ERROR，但可被用户定义的处理程序捕获。（参见 set_error_handler()）
			8191		E_ALL 						所有错误和警告。（在 PHP 5.4 中，E_STRICT 成为 E_ALL 的一部分）

			现在创建一个处理错误的函数:
				function customError($errno,$errstr){
					echo "<b>Error:</b>[$errno] $errstr<br>";
					echo "脚本结束";
					die();
				}
			上面的代码是一个简单的错误处理函数。当它被触发时，它会取得错误级别和错误消息。然后它会输出错误级别和消息，并终止脚本。
			现在，我们已经创建了一个错误处理函数，我们需要确定在何时触发该函数。
		5.设置错误处理程序
			PHP 的默认错误处理程序是内建的错误处理程序。我们打算把上面的函数改造为脚本运行期间的默认错误处理程序。
			可以修改错误处理程序，使其仅应用到某些错误，这样脚本就能以不同的方式来处理不同的错误。然而，在本例中，我们打算针对所有错误来使用我们自定义的错误处理程序：
				set_error_handler("customError");
			由于我们希望我们的自定义函数能处理所有错误，set_error_handler()仅需要一个参数，可以添加第二个参数来规定错误级别。
			实例：
				通过尝试输出不存在的变量，来测试这个错误处理程序：
				<?php
				// 错误处理函数
				function customError($errno, $errstr)
				{
					echo "<b>Error:</b> [$errno] $errstr";
				}

				// 设置错误处理函数
				set_error_handler("customError");

				// 触发错误
				echo($test);
				?>
			以上代码的输出如下所示：
				Error:	[8]	Undefined variable: test
		6.触发错误
			在脚本中用户输入数据的位置，当用户的输入无效时触发错误是很有用的。在PHP中，这个任务由trigger_error()函数完成。
			实例：
			在本例中，如果"test"变量大于"1",就会发生错误：
			<?php 
				$test = 2;
				if($test>1){
					trigger_error("变量值必须小于等于1")；
				}
			？>
			以上代码输出；
				Notice:	  变量值必须小于等于1
				in /www/test/runoob.php on line 5
			您可以在脚本任何位置触发错误，通过添加的第二个参数，您能够规定所触发的错误级别。
			可能的错误类型：
				E_USER_ERROR-致命的用户生成run-time错误，错误无法恢复。脚本执行被中断。
				E_USER_WARNING - 非致命的用户生成的 run-time 警告。脚本执行不被中断。
				E_USER_NOTICE - 默认。用户生成的 run-time 通知。在脚本发现可能有错误时发生，但也可能在脚本正常运行时发生。
			实例：
			在本例中，如果 "test" 变量大于 "1"，则发生 E_USER_WARNING 错误。如果发生了 E_USER_WARNING，我们将使用我们自定义的错误处理程序并结束脚本：
			<?php
			// 错误处理函数
			function customError($errno, $errstr)
			{
				echo "<b>Error:</b> [$errno] $errstr<br>";
				echo "脚本结束";
				die();
			}

			// 设置错误处理函数
			set_error_handler("customError",E_USER_WARNING);

			// 触发错误
			$test=2;
			if ($test>1)
			{
				trigger_error("变量值必须小于等于 1",E_USER_WARNING);
			}
			?>
			以上代码的输出如下所示：
			Error:	[512] 变量值必须小于等于 1
			脚本结束

			现在，我们已经学习了如何创建自己的 error，以及如何触发它们，接下来我们研究一下错误记录
		7.错误记录
			在默认的情况下，根据在php.ini中的error_log配置，PHP向服务器的记录系统或文件发送错误记录。通过使用 error_log() 函数，您可以向指定的文件或远程目的地发送错误记录。
			通过电子邮件向您自己发送错误消息，是一种获得指定错误的通知的好办法。
		8.通过E-Mail发送错误信息
			在下面的例子中，如果特定的错误发生，我们将发送带有错误消息的电子邮件，并结束脚本：
			<?php
			// 错误处理函数
			function customError($errno, $errstr)
			{
				echo "<b>Error:</b> [$errno] $errstr<br>";
				echo "已通知网站管理员";
				error_log("Error: [$errno] $errstr",1,
				"someone@example.com","From: webmaster@example.com");
			}

			// 设置错误处理函数
			set_error_handler("customError",E_USER_WARNING);

			// 触发错误
			$test=2;
			if ($test>1)
			{
				trigger_error("变量值必须小于等于 1",E_USER_WARNING);
			}
			?>

			以上代码的输出如下所示：
				Error:  [512] 变量值必须小于等于1
				已通知网站管理员
			接收自以上代码的邮件如下所示：
				Error:  [512] 变量值必须小于等于1
			这个方法不适合所有的错误，常规错误应当通过使用默认的PHP记录系统在服务器上进行记录。
	*/
	//PHP 异常处理
	/*
		1.异常是什么
			PHP 5 提供了一种新的面向对象的错误处理方法。
			异常处理用于在指定的错误（异常）情况发生时改变脚本的正常流程。这种情况成为异常。
			当异常被触发时，通常会发生：
				当前代码状态被保存
				代码执行被切换到预定义（自定义）的异常处理器函数
				根据情况，处理器也许会从保存的代码状态重新开始执行代码，终止脚本执行，或从代码中另外的位置继续执行脚本
			我们将展示不同的错误处理方法：
				异常的基本使用
				创建自定义的异常处理器
				多个异常
				重新抛出异常
				设置顶层异常处理器
			注释：异常应该仅仅在错误情况下使用，而不应该用于在一个指定的点跳转到代码的另一个位置。
		2.异常的基本使用
			？?
		？？

	*/
	//PHP 过滤器
	/*
		1.什么是PHP过滤器？
			PHP过滤器用于验证和过滤来自非安全来源的数据。
			测试，验证和过滤用户输入或自定义数据是任何Web应用程序的重要组成部分。
			PHP的过滤器扩展的设计目的是使数据过滤更轻松快捷。
		2.为什么使用过滤器？
			几乎所有的web应用程序都依赖外部的输入，这些数据通常来自用户或其他应用程序（比如web服务）。通过使用过滤器，您能够确保应用程序获得正确的输入类型。
			您应该始终对外部的数据进行过滤。
			输入过滤
	*/
?>
</body>
</html>