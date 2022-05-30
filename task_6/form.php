
<?php
if (!empty($messages)) {
    print('<div id="messages">');
    foreach ($messages as $message) {
        print($message);
    }
    print('</div>');
}
if (!empty($_COOKIE[session_name()]) && !empty($_SESSION['login']))
    print('Привет, ' . $_SESSION['login'] . '   <a href="logout.php">Выйти</a>');
else {
    print('<a href="login.php">Войти</a>');
}
?>
<head>
<title>Задание 6</title>
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<form id="form" method="POST" action="">
    <label> <input type="text" placeholder="Имя" name="fio" <?php if ($errors['fio']) {
                                                                print 'class="error"';
                                                            } ?> value="<?php print $values['fio']; ?>" /><br /></label>
    <label><input type="email" placeholder="Email" name="email" <?php if ($errors['email']) {
                                                                    print 'class="error"';
                                                                } ?> value="<?php print $values['email']; ?>" /><br /></label>
    <label><input type="date" name="date" <?php if ($errors['date']) {
                                                print 'class="error"';
                                            } ?> value="<?php print $values['date']; ?>" /><br /></label>
    <label <?php if ($errors['gender']) {
                print 'class="error"';
            } ?>>
        <label>
            Пол
            <input type="radio" name="gender" value="male" <?php if ($values['gender'] == 'male') {
                                                                print 'checked';
                                                            }; ?> />Мужской
        </label>
        <label>
            <input type="radio" name="gender" value="female" <?php if ($values['gender'] == 'female') {
                                                                    print 'checked';
                                                                }; ?> />Женский
        </label>
    </label>
    <br />
    <label <?php if ($errors['arms']) {
                print 'class="error"';
            } ?>>
        <label>
            Кол-во конечностей
            <input type="radio" name="arms" value="1" <?php if ($values['arms'] == '1') {
                                                            print 'checked';
                                                        }; ?> />1
        </label>
        <label> <input type="radio" name="arms" value="2" <?php if ($values['arms'] == '2') {
                                                                print 'checked';
                                                            }; ?> />2 </label>
        <label>
            <input type="radio" name="arms" value="more" <?php if ($values['arms'] == '3') {
                                                                print 'checked';
                                                            }; ?> />3 и более
        </label>
    </label>
    <br /><br />
    <label>
        Сверхспособность<br />
        <select name="arg[]" multiple="multiple" <?php if ($errors['arg']) {
                                                        print 'class="error"';
                                                    } ?>>
            <option value="god" <?php $a = explode(',', $values['arg']);
                                foreach ($a as $key) {
                                    if ($key == 'god') {
                                        print 'selected';
                                    }
                                } ?>>Бессмертие</option>
            <option value="wall" <?php $a = explode(',', $values['arg']);
                                    foreach ($a as $key) {
                                        if ($key == 'wall') {
                                            print 'selected';
                                        }
                                    } ?>>Прохождение сквозь стены</option>
            <option value="fly" <?php $a = explode(',', $values['arg']);
                                foreach ($a as $key) {
                                    if ($key == 'fly') {
                                        print 'selected';
                                    }
                                } ?>>Левитация</option>
        </select> </label><br /><br />
    <label> Биография<br /> <textarea name="about" <?php if ($errors['about']) {
                                                        print 'class="error"';
                                                    } ?>><?php print $values['about']; ?></textarea></label><br />
    <label <?php if ($errors['check']) {
                print 'class="error"';
            } ?>><input type="checkbox" name="check" value="Yes" />С контрактом ознакомлен</label><br /><br />
    <button type="submit" class="button-4">Отправить</button>
</form>
