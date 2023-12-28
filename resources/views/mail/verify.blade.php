<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vérifiez votre compte</title>
</head>
<body>

<p>
    Salut  <b>{{$details['name']}}</b> !!
</p>
<br>

<p>
    Voici vos données :
</p>

<table>
    <tr>
        <td>Nom complet</td>
        <td>:</td>
        <td>{{$details['name']}}</td>
    </tr>
    <tr>
        <td>Role</td>
        <td>:</td>
        <td>{{$details['role']}}</td>
    </tr>
    <tr>
        <td>Website</td>
        <td>:</td>
        <td>{{$details['website']}}</td>
    </tr>
    <tr>
        <td>Date d'inscription</td>
        <td>:</td>
        <td>{{$details['datetime']}}</td>
    </tr>
    <br><br><br>

    <center>
        <h3>Cliquez ci-dessous pour vérifier votre compte:</h3>
        <a href="{{$details['url']}}" style="text-decoration: none ; color: rgb(225,255,255) ; padding: 9px ; background-color: blue  ; border-radius: 20% ">vérification</a>
        <br><br><br>

        <p>
              copy right @ 2023 | Groupe LarocheTic
        </p>
    </center>
</table>


</body>
</html>
