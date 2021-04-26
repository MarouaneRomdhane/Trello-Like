<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="@route('form.store')">

    @csrf

        <label for='name'>Entrez votre nom : </label>
        <input name='name' type='text' placeholder="Mon NOM">

        <label for='com'>Entrez votre message : </label>
        <input name='com' type='textarea' placeholder="Message">

        <input type='submit' value='Valider'>

    </form>

</body>
</html>


