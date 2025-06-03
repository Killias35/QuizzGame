document.addEventListener("DOMContentLoaded", () => {
    const briefingText = document.getElementById('briefing-text');
    const briefingContainer = document.getElementById('briefing');

    const startBtn = document.getElementById("start-btn");
    const questionContainer = document.getElementById("question-container");

    let currentPage = 0;

    function showNextPage() {
        if (currentPage < briefingPages.length) {
            briefingText.innerText = briefingPages[currentPage];
            currentPage++;
        } else {
            // Fin du briefing, on passe à la question
            briefingContainer.classList.add('hidden');
            questionContainer.classList.remove('hidden');
        }
    }

    startBtn.addEventListener('click', showNextPage);

    // Affiche la première page immédiatement
    showNextPage();
});
