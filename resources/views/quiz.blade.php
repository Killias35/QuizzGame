@vite(['resources/js/quiz.js', 'resources/css/quiz.css'])

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Question Mystère</title>
</head>
<body>
    {{-- Briefing en plusieurs pages --}}
    <div id="briefing">
        <p id="briefing-text"></p>
        <button id="start-btn">Continuer</button>
    </div>

    {{-- Question container --}}
    <div id="question-container" class="container hidden">
        <div class="level-indicator">Niveau : {{ $questionid }}</div>

        @if(session('error'))
            <div style="color:red; font-weight:bold;">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ url('/check-answer') }}">
            @csrf
            <label for="answer">{{ $question }}</label><br>
            <input type="text" id="answer" name="answer" required autocomplete="off">
            <input type="hidden" id="questionid" name="questionid" value="{{ $questionid }}">
            <button type="submit">Envoyer</button>
        </form>
    </div>

    {{-- Overlays --}}
    <div id="death-text" class="overlay red">YOU DIED</div>
    <div id="victory-text" class="overlay gold">VICTORY ACHIEVED</div>

    {{-- Injection du briefing --}}
    <script>
        const briefingPages = @json($briefing);
    </script>
</body>
</html>
