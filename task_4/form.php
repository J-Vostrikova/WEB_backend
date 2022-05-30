<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'/>
  <title>Задание 4</title>
</head>
<body>
  
  <div class="form-wrapper">
<div class="form-layer">
<h1 class ="titles" id="linktitle"> Форма </h1>
    <form action="" method="POST">
          <label class="field-name">
            Имя <br>
          <input name="name" type="text" 
          <?php if($errors['name']) print('class="error"');?> value="<?php print($values['name'])?>" /> <br>
        </label><div class = "ots"><?php if($errors['name']) print($messages['name']) ?> </div>
          

          <label class="field-name" style="">
            E-mail <br>
          
          <input name="email" type="text" 
          <?php if($errors['email']) print('class="error"');?> value="<?php print($values['email'])?>" /><br> 
        </label><div class = "ots"><?php if($errors['email']) print($messages['email']) ?> </div>
        
          <label class="field-name">
            Дата рождения <br>
            <input type = "date" <?php if($errors['bdate']) print('class="error"');?> value="<?php print($values['bdate'])?>"/> <br>
            <div class = "ots"><?php if($errors['bdate']) print($messages['bdate']) ?> </div>
            </label>

          <label class="field-name">
            Пол <br>
              <?php if ($errors['gender']) {print 'class="error"';} ?>
          
          <input type="radio" name="gender" value="m" <?php if ($errors['gender']) {print 'class="error"';} else if ($values['gender'] == 'm') {print 'checked';} ?> >
          <label>
            Мужской
          </label>
          <input type="radio" name="gender" value="w" <?php if ($errors['gender']) {print 'class="error"';} else if ($values['gender'] == 'w') {print 'checked';} ?> >
          <label>
            Женский
          </label><br>
          </label><div class = "ots"><?php if($errors['gender']) print($messages['gender']) ?></div>
          
          <label class="field-name">
            Количество конечностей <br>
             <?php if ($errors['limbs']) {print 'class="error"';} ?>
          </label>
          <input type="radio" name="limbs" value=0 <?php if ($errors['limbs']) {print 'class="error"';} else if ($values['limbs'] == 0) {print 'checked';} ?> >
          <label>0</label>
          <input type="radio" name="limbs" value=1 <?php if ($errors['limbs']) {print 'class="error"';} else if ($values['limbs'] == 1) {print 'checked';} ?> >
          <label>1</label>
          <input type="radio" name="limbs" value=2 <?php if ($errors['limbs']) {print 'class="error"';} else if ($values['limbs'] == 2) {print 'checked';} ?> >
          <label>2</label>
          <input type="radio" name="limbs" value=3 <?php if ($errors['limbs']) {print 'class="error"';} else if ($values['limbs'] == 3) {print 'checked';} ?> >
          <label>3</label>
          <input type="radio" name="limbs" value=4 <?php if ($errors['limbs']) {print 'class="error"';} else if ($values['limbs'] == 4) {print 'checked';} ?> >
          <label>4</label><br>
          <div class = "ots"> <?php if($errors['limbs']) print($messages['limbs']) ?></div>

        
  
          <label class="field-name">
            Сверхспособности <br>
            <?php if ($errors['superpowers']) {print 'class="error"';} ?> 
          </label>
          <select multiple="true" name="superpowers[]" class="select-list">
              <option value="Бессмертие" <?php if (in_array("Бессмертие", $superpowers)) {print 'selected';} ?> >Бессмертие</option>
              <option value="Прохождение сквозь стены" <?php if (in_array("Прохождение сквозь стены", $superpowers)) {print 'selected';} ?> >Прохождение сквозь стены</option>
              <option value="Левитация" <?php if (in_array("Левитация", $superpowers)) {print 'selected';} ?> >Левитация</option><br>
          </select>
          <div class = "ots"><?php if($errors['superpowers']) print($messages['superpowers']) ?></div><br>        
          <label class="field-name">
            Биография <br>
          <textarea name="bio" cols="30" rows="10" style="resize: none;" <?php if ($errors['bio']) {print 'class="error"';} ?> ><?php echo($values['bio']);?></textarea><br>
          <div class = "ots"><?php if($errors['bio']) print($messages['bio'])?></div><br>
        
            <label class="field-name">
              <?php if ($errors['checkbox']) {print 'class="error"';} ?>   
            </label>
          <input type="checkbox" name="checkbox" <?php if ($errors['checkbox']) {print 'class="error"';} ?> <?php if ($values['checkbox']) {print 'checked';} ?> >
          <label>
            С контрактом ознакомлен
          </label><div class = "ots"><?php if($errors['checkbox']) print($messages['checkbox'])?></div><br>     
          <input type="submit" class="sub" value="Отправить" /><br>
          <div class = "ots"><?php if($errors['checkbox']) print($messages['checkbox'])?></div>        
          <p style="color:forestgreen;">
            <?php if ($messages['data_saved']) {print $messages['data_saved'];} ?>
          </p>
    </form>
</body>
</html>
