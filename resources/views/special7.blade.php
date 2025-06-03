@vite(['resources/js/special7.js', 'resources/css/quiz.css', 'resources/css/special7.css'])

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Question spéciale</title>
</head>
<body>
    <div class="container">
        <h2 style="font-size: 2em; margin-bottom: 30px;">Fais ce qu’on te dit…</h2>
        <p style="font-size: 1.5em; margin-bottom: 20px;">Clique sur le bouton rouge sans trembler.</p>

        <button id="secret-button" class="action-button">NE PAS CLIQUER</button>

        <form method="POST" action="{{ url('/special-check') }}" id="special-form" class="hidden">
            @csrf
            <input type="hidden" name="special_action" value="clicked">
        </form>

        <div id="death-text" class="overlay red">YOU DIED</div>
        <div id="victory-text" class="overlay gold">VICTORY ACHIEVED</div>
    </div>
</body>
</html>
