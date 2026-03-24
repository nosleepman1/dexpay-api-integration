<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Réussi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-md text-center">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Abonnement Actif !</h2>
        <p class="text-gray-600 mb-8">Merci pour votre paiement de 100 FCFA. Votre abonnement mensuel a bien été pris en compte.</p>
        <a href="{{ route('subscription.index') }}" class="inline-block bg-gray-900 text-white font-semibold py-3 px-8 rounded-lg hover:bg-gray-800 transition">Retour à l'accueil</a>
    </div>
</body>
</html>
