<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo !empty($msg)? $msg : "";?></h1>
    <form action="?url=Customer/register" method="post">
        <label for="email">email</label>
        <input type="email" name="email">
<br>
        <label for="password">password</label>
        <input type="password" name="password_key">
<br>
        <label for="name">name</label>
        <input type="text" name="name">
<br>
        <label for="surname">surname</label>
        <input type="text" name="surname">
<br>    
        <label for="phone">phone</label>
        <input type="text" name="phone">
<br>    
        <label for="cpf">cpf</label>
        <input type="text" name="cpf">
<br>    
          <input type="text" name="active" hidden value="1">
<br>
        <input type="submit" value="send">
    </form>
</body>
</html>