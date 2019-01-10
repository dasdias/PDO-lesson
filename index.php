<?php 

// $db = new PDO('mysql:host=localhost;dbname=wd05-filmoteka-dianov', 'root',''); // подключаемся к sql базе 

// $sql = "SELECT * FROM films"; // запись запроса в переменную на вывод всей информации из таблицы films

// $result = $db->query($sql); // выполнение запроса и запись результата в переменную $result

// Простой выбор данных из БД

// echo "<h2>Вывод записей из результата по одной:</h2>";

	// $result->fetch(PDO::FETCH_ASSOC); // метод fetch(PDO::FETCH_ASSOC) выводит одну строку из объекта $result

	/*while ( $film = $result->fetch(PDO::FETCH_ASSOC) ) { // записываем массив $film методом fetch и выколняем цикл пока результат TRUE
		echo "<pre>";
		echo "Название фильма: " . $film['title'].".<br>"; // выводим из массива film запись хранящуюся в ключе title
		echo "Название жанра: " . $film['genre'].".<br>";
		echo "Год фильма: " . $film['year'].".<br>";
		print_r( $film ); // распечатываем массив 
		echo "</pre>";		
	}*/

// echo "<h2>Вывод сразу всех записей из результата:</h2>";
// $result->fetchAll(PDO::FETCH_ASSOC); // выводим сразу все записи из объекта $result методом fetchAll(PDO::FETCH_ASSOC)

// echo "<pre>";
// print_r($result->fetchAll(PDO::FETCH_ASSOC));
// echo "</pre>";

/*$films = $result->fetchAll(PDO::FETCH_ASSOC); // создаем массив $films методом fetchAll(PDO::FETCH_ASSOC)

foreach ($films as $value) {
	echo "<pre>";
	echo "Название фильма: ". $value['title'];
	echo "</pre>";
}*/

// $result->bindColumn('id', $id); // для колонки id создаём переменную $id
// $result->bindColumn('title', $title); // для колонки title создаём переменную $title
// $result->bindColumn('genre', $genre); // для колонки genre создаём переменную $genre
// $result->bindColumn('year', $year); // для колонки year создаём переменную $year

// echo "<h2>Вывод записей с привязкой данных к переменным:</h2>";

/*while ( $result->fetch(PDO::FETCH_ASSOC) ) { // обходим объект $result методом fetch(PDO::FETCH_ASSOC)
	echo "ID: {$id} <br>"; // выводим переменную
	echo "Название: {$title} <br>";
	echo "Название: {$genre} <br>";
	echo "Название: {$year} <br>";
	echo "<br><br>";
}
*/









// Выбор данных из БД с защитой


// $db = new PDO('mysql:host=localhost;dbname=wd05-filmoteka-dianov', 'root','');

// 1. выборка без защиты от SQL иньекций

/*$userName = 'Joker';
$password = '555';

$sql = "SELECT * FROM login WHERE login='{$userName}' AND password='{$password}' ";

$result = $db->query($sql);
*/
// echo print_r($result->fetch(PDO::FETCH_ASSOC));
/*echo "<h2>выборка без защиты от SQL иньекций</h2>";

if ( $result->rowCount() == 1 ) {
	$user = $result->fetch(PDO::FETCH_ASSOC);
	echo "Имя пользователя: {$user['login']} <br>";
	echo "Пароль пользователя: {$user['password']} <br>";
}
*/
// 2. Выборка с защитой от SQL инекций - в ручном режиме

/*$username = 'Joker';
$password = '555';

// $username = $db->quote($username);
$username = strtr($username, array('_'=>'\_', '%'=>'\%'));
// $password = $db->quote($password);
$password = strtr($password, array('_'=>'\_', '%'=>'\%'));

$sql = "SELECT * FROM login WHERE login='{$username}' AND password='{$password}' ";

$result = $db->query($sql);

echo "<h2>Выборка с защитой от SQL инекций - в ручном режиме</h2>";

if ( $result->rowCount() == 1 ) {
	$user = $result->fetch(PDO::FETCH_ASSOC);
	echo "Имя пользователя: {$user['login']} <br>";
	echo "Пароль пользователя: {$user['password']} <br>";
}
*/











// 3. Выборка с защитой от SQL инекций - в АВТОМАТИЧЕСКОМ режиме

// $db = new PDO('mysql:host=localhost;dbname=wd05-filmoteka-dianov', 'root','');

/*$sql = "SELECT * FROM login WHERE login = :username AND password = :password LIMIT 1";
*/
/*$stmt = $db->prepare($sql);

$username = 'Joker';
$password = '555';

$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $password);
$stmt->execute();
*/

// Если не хотим для каждого значения выводить метод bindValue то можно сразу в ->execute

/*$stmt->execute(array(':username' =>$username, ':password' => $password));*/

/*if ( $stmt->rowCount() == 1 ) {
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	echo "Имя пользователя: {$user['login']} <br>";
	echo "Пароль пользователя: {$user['password']} <br>";
} else {
	echo "Что то пошло не так";
}*/

/*$stmt->fetch();
echo "Имя пользователя: {$username} <br>";
	echo "Пароль пользователя: {$password} <br>";
*/

// 4. Выборка с защитой от SQL инекций - в АВТОМАТИЧЕСКОМ режиме -Другой формат

/*$sql = "SELECT * FROM login WHERE login = ? AND password = ? LIMIT 1";

$stmt = $db->prepare($sql);


$username = 'Joker';
$password = '555';

$stmt->bindValue(1, $username);
$stmt->bindValue(2, $password);
$stmt->execute();

$stmt->bindColumn('login', $login);
$stmt->bindColumn('password', $password);*/

// Если не хотим для каждого значения выводить метод bindValue то можно сразу в ->execute

/*$stmt->execute(array($username, $password));

$stmt->fetch();
echo "Имя пользователя: {$login} <br>";
	echo "Пароль пользователя: {$password} <br>";


$string = "<script>Hello!</script>";
$string = htmlentities($string);

echo "$string";
*/





// Вставка данных в БД

/*$db = new PDO('mysql:host=localhost;dbname=wd05-filmoteka-dianov', 'root',''); // подключаемся к sql базе 

// подглтовка запроса

$sql = "INSERT INTO login (login, password) VALUES (:login, :password)";

$stmt =$db->prepare($sql);

$username = "Flash";
$password = "777";


$stmt->bindValue(':login',$username);
$stmt->bindValue(':password',$password);
$stmt->execute();
*/
/*$stmt->execute(array(':username' =>$username, ':password' => $password));*/

/*
echo "<p>Было затронуто строк: ". $stmt->rowCount() ."</p>";
echo "<p>ID вставленной записи: ". $db->lastinsertId() ."</p>";

*/








// Обновление данных

$db = new PDO('mysql:host=localhost;dbname=wd05-filmoteka-dianov', 'root',''); // подключаемся к sql базе 

$sql = "UPDATE login SET login = :name,  password = :password WHERE id = :id";

$stmt =$db->prepare($sql);

$username = "New Flash";
$password = "888";
$id = "5";

$stmt->bindValue(':name', $username);
$stmt->bindValue(':password', $password);
$stmt->bindValue(':id', $id);
$stmt->execute();

echo "<p>Было затронуто строк: ". $stmt->rowCount() ."</p>";








// Удаление данных

$db = new PDO('mysql:host=localhost;dbname=wd05-filmoteka-dianov', 'root',''); // подключаемся к sql базе 

$sql = "DELETE FROM login WHERE login = :name";

$stmt =$db->prepare($sql);

$username = "New Flash";

$stmt->bindValue(':name', $username);
$stmt->execute();


echo "<p>Было затронуто строк: ". $stmt->rowCount() ."</p>";

?>