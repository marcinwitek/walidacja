<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Formularz</title>
    <meta charset="utf-8">
    
    <link type="text/css" rel="stylesheet" href="bootstrap.min.css" />
    
    <style type="text/css">
		.wrapper {width: 30%; margin: 0 auto; padding-top: 30px;}
	</style>
    
</head>
<body>

	<div class="wrapper">

	<form action="" method="post" id="form">
    	<fieldset>
        
        	<label for="name">Imię: <i>*</i></label>
            <input type="text" name="name" id="name" class="req" value="<?php echo $form['name']; ?>" />
            <?php echo $error['name']; ?>
            
            <label for="phone">Telefon: <i>*</i></label>
            <input type="text" name="phone" id="phone" class="req" value="<?php echo $form['phone']; ?>" />
            <?php echo $error['phone']; ?>
            
            <label for="email">Email: <i>*</i></label>
            <input type="text" name="email" id="email" class="req" value="<?php echo $form['email']; ?>" />
            <?php echo $error['email']; ?>
            
            <label for="message">Wiadomość: </label>
            <textarea name="message" id="message"><?php echo $form['message']; ?></textarea>
            
            <p>* - pola wymagane</p>
            
            <input type="submit" name="submit" id="submit" value="Wyślij" class="btn btn-primary"/>
        
        </fieldset>
    </form>
    
    </div>

</body>
</html>