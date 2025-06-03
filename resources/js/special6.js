document.addEventListener('DOMContentLoaded', () => {
  const target = 1000;
  let count = 0;
  const counterEl = document.getElementById('click-count');
  const clickBtn = document.getElementById('click-button');
  const cheatBtn = document.getElementById('cheat-button');
  const form = document.getElementById('finish-form');
  const commentaryEl = document.getElementById('commentary');

  // Liste de commentaires
  const comments = [
    "Ta foi est remarquable...",
    "Encore un effort !",
    "Tu te rapproches de la divine vérité.",
    "Ton dieu t'observe.",
    "Lève-toi, fidèle.",
    "N’abandonne jamais.",
    "Ton sacrifice est noté.",
    "Garde le cap.",
    "Rappelle-toi pourquoi tu commences.",
    "Ton coeur brûle de ferveur."
  ];

  // Incrémente le compteur et gère tous les effets
  function increment() {
    count++;
    counterEl.textContent = count;

    // Affiche un commentaire toutes les 10 clics
    if (count % 10 === 0) {
      const idx = (count / 10 - 1) % comments.length;
      commentaryEl.textContent = comments[idx];
    }

    // Rendre le bouton "Tricher" progressivement visible
    if (count === 50) { // au 50ème clic pile
        cheatBtn.classList.add('visible');
    }

    // Si on atteint la cible, on soumet
    if (count >= target) {
      form.classList.remove('hidden');
      form.submit();
    }
  }

  // Clic principal
  clickBtn.addEventListener('click', increment);

  // Clic Tricher → auto-clic
  cheatBtn.addEventListener('click', () => {
    clickBtn.disabled = true;
    cheatBtn.disabled = true;
    const interval = setInterval(() => {
      increment();
      if (count >= target) clearInterval(interval);
    }, 1);
  });
});
