@vite(['resources/js/quiz.js', 'resources/css/quiz.css'])

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu</title>
</head>
<body id="body">
    <div id="briefing">
        <p id="briefing-text"></p>
        <button id="start-btn">Continuer</button>
    </div>

    <div id="game-content" class="container hidden">
        @include($viewdata, $data ?? [])
    </div>
    <script>
        const briefingPages = @json($briefing);
        let currentPage = 0;
        const briefingText = document.getElementById("briefing-text");
        const startBtn = document.getElementById("start-btn");
        const briefingDiv = document.getElementById("briefing");
        const contentDiv = document.getElementById("game-content");

        function showPage(index) {
            if (index < briefingPages.length) {
                briefingText.innerText = briefingPages[index];
            } else {
                briefingDiv.classList.add("hidden");
                contentDiv.classList.remove("hidden");
            }
        }

        startBtn.addEventListener("click", () => {
            currentPage++;
            showPage(currentPage);
        });

        showPage(0);
    </script>
</body>
</html>
