document.addEventListener('DOMContentLoaded', () => {
    const balloon = document.getElementById('balloon');
    const trashBin = document.getElementById('trash-bin');
    const continueBtn = document.getElementById('continue-button');
    const form = document.getElementById('finish-form');

    function randomPosition() {
        const padding = 150;
        const maxX = window.innerWidth - padding;
        const maxY = window.innerHeight - padding - 150;
        const x = Math.random() * maxX;
        const y = Math.random() * maxY;
        return { x, y };
    }

    function placeBalloon() {
        const pos = randomPosition();
        balloon.style.left = `${pos.x}px`;
        balloon.style.top = `${pos.y}px`;
    }

    placeBalloon();

    let offsetX = 0;
    let offsetY = 0;
    let dragging = false;

    balloon.addEventListener('mousedown', (e) => {
        dragging = true;
        balloon.classList.add('dragging');
        offsetX = e.clientX - balloon.getBoundingClientRect().left;
        offsetY = e.clientY - balloon.getBoundingClientRect().top;
        e.preventDefault();
    });

    document.addEventListener('mouseup', (e) => {
        if (!dragging) return;
        dragging = false;
        balloon.classList.remove('dragging');

        const binRect = trashBin.getBoundingClientRect();
        const balloonRect = balloon.getBoundingClientRect();

        if (
            balloonRect.left < binRect.right &&
            balloonRect.right > binRect.left &&
            balloonRect.top < binRect.bottom &&
            balloonRect.bottom > binRect.top
        ) {
            balloon.style.display = 'none';
            trashBin.classList.remove('highlight');
            continueBtn.classList.remove('hidden');
            document.getElementById('instruction').textContent = 'Bravo ! Tu as réussi.';
        } else {
            trashBin.classList.remove('highlight');
            placeBalloon();
        }
    });

    document.addEventListener('mousemove', (e) => {
        if (!dragging) return;
        const x = e.clientX - offsetX;
        const y = e.clientY - offsetY;

        balloon.style.left = `${x}px`;
        balloon.style.top = `${y}px`;

        const binRect = trashBin.getBoundingClientRect();
        const balloonRect = balloon.getBoundingClientRect();

        if (
            balloonRect.left < binRect.right &&
            balloonRect.right > binRect.left &&
            balloonRect.top < binRect.bottom &&
            balloonRect.bottom > binRect.top
        ) {
            trashBin.classList.add('highlight');
        } else {
            trashBin.classList.remove('highlight');
        }
    });

        continueBtn.addEventListener('click', () => {
          
          form.classList.remove('hidden');
          form.submit();
        });

    // --- NOUVEAU : téléportation toutes les secondes sauf si dragging ---
    setInterval(() => {
        if (balloon.style.display !== 'none') {
            placeBalloon();
        }
    }, 500);
});
