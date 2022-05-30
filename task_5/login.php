<?php
/**
 * Файл login.php для не авторизованного пользователя выводит форму логина.
 * При отправке формы проверяет логин/пароль и создает сессию,
 * записывает в нее логин и id пользователя.
 * После авторизации пользователь перенаправляется на главную страницу
 * для изменения ранее введенных данных.
 **/

// Отправляем браузеру правильную кодировку,
// файл login.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

session_start();
// В суперглобальном массиве $_SESSION хранятся переменные сессии.
// Будем сохранять туда логин после успешной авторизации

if (!empty($_SESSION['login'])) {
  header('Location: ./');
}
// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (!empty($_GET['error']))
  print("<div>Такого пользователя не существует!</div>");
  if (!empty($_GET['wrong']))
  print("<div>Неверный пароль!</div>");

?>

<form action="" method="post">
<input name="login" placeholder="Логин"/>
  <input name="pass" placeholder="Пароль"/>
  <input type="submit" value="Войти" />
</form>

<?php
// Иначе, если запрос был методом POST, т.е. нужно сделать авторизацию с записью логина в сессию.

}
else {
  print($_SERVER['REQUEST_METHOD']);
  $user = 'u47547';
  $pass = '6436955';
  $db = new PDO('mysql:host=localhost;dbname=u47547', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
  $login = $_POST['login'];
  try {
    $stmt = $db->prepare("SELECT * FROM heroes2 WHERE login = ?");
    $stmt -> execute([$login]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC); //возвращает массив, индексированный именами столбцов результирующего набора
    if (!$row) {
      header('Location: ?error=1&row='.$_POST['login']);
      exit();
    }
    if(md5($_POST['pass']) !== $row['password']){
      header('Location: ?wrong=1');
      exit();
    }
  }
  catch(PDOException $e){
    print('Error : ' . $e->getMessage());
    exit();
  }
  // Если все ок, то авторизуем пользователя.

  $_SESSION['login'] = $_POST['login'];
  // Записываем ID пользователя.

  $_SESSION['uid'] = $row['id'];

  header('Location: ./');
}
