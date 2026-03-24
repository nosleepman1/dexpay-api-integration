<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'abonner - PayDunya</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md text-center transform transition-all hover:-translate-y-1 hover:shadow-2xl">
        <div class="mb-6">
            <svg class="w-16 h-16 text-blue-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Accès Premium</h1>
        <p class="text-gray-500 mb-6 font-medium">Abonnement mensuel récurrent</p>
        
        <div class="bg-blue-50 rounded-lg p-6 mb-8 border border-blue-100">
            <div class="text-5xl font-black text-blue-600 mb-2">100 <span class="text-xl text-blue-400 font-bold">FCFA</span></div>
            <div class="text-sm text-blue-500 font-semibold uppercase tracking-wider">/ mois</div>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded text-left text-sm" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <form action="{{ route('subscription.pay') }}" method="POST">
            @csrf
            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                S'abonner avec PayDunya
            </button>
        </form>
        
        <p class="mt-4 text-xs text-gray-400">
            Dépôt sur le numéro <strong>773757077</strong><br>
            Paiement sécurisé via Orange Money, Wave, Free Money et Djamo.
        </p>
    </div>
</body>
</html>
