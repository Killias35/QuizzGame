document.addEventListener("DOMContentLoaded", () => {
    const briefingText = document.getElementById('briefing-text');
    const briefingContainer = document.getElementById('briefing');

    const startBtn = document.getElementById("start-btn");

    let currentPage = 0;

    function showNextPage() {
        if (currentPage < briefingPages.length) {
            briefingText.innerText = briefingPages[currentPage];
            currentPage++;
        } else {
            briefingContainer.classList.add('hidden');
            document.getElementById('body').classList.add('started');
        }
    }



    startBtn.addEventListener('click', showNextPage);

    // Affiche la première page immédiatement
    showNextPage();
});
