<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous Confirmé</title>
</head>
<body>
<h1>Rendez-vous Confirmé</h1>
<p>Merci d'avoir choisi nos services. Votre rendez-vous a été confirmé.</p>

<p>Détails du rendez-vous :</p>
<ul>
    <li><strong>Votre Nom : </strong> {{ $appointment->client->nom }} {{ $appointment->client->prenom }}</li>
    <li><strong>Service:</strong> {{ $appointment->service->name }}</li>
    <li><strong>Date:</strong> {{ $appointment->date }}</li>
    <li><strong>Heure:</strong> {{ $appointment->heure }}</li>
</ul>

<p>Cliquez sur le bouton ci-dessous pour confirmer :</p>
<a href="{{ route('confirmAppointment', ['id' => $appointment->id]) }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none;">Valider le Rendez-vous</a>

<p>Si vous n'avez pas demandé ce rendez-vous ou si vous avez des questions, veuillez nous contacter.</p>

<p>Merci,</p>
<p>Groupe laroche </p>
</body>
</html>
