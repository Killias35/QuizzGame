function agrandirImage(imageElement, facteur = 1.2, duree = 300) {
  if (!imageElement) return;

  imageElement.style.transition = `transform ${duree}ms ease`;
  imageElement.style.transform = `scale(${facteur})`;
}


document.addEventListener('DOMContentLoaded', () => {
    const messiText = document.getElementById('messitext');
    const picture = document.querySelector('.el1');
    const form = document.getElementById('finish-form');

    const comments = [
        "Alors, t'es vraiment prêt à perdre ?",
        "T'as trouvé une ancienne photo de moi ? pas mal mais il n'y a rien d'autre.",
        "Je pensais que tu abandonnerais plus vite.",
        "Plus tu avances, plus tu te ridiculises.",
        "Franchement, tu devrais arrêter là."
    ];

    let revealed = 0;
    let pictureClick = 0;
  
    picture.addEventListener('click', () => {
        console.log('click');
    if (!picture.classList.contains('clicked')) {
        picture.classList.add('clicked');
        revealed++;
        const index = Math.min(revealed, comments.length - 1);
        messiText.textContent = comments[index];
    }
    else if(!picture.classList.contains('inactive')){
        console.log('picture cliquée');
        pictureClick++;

        if (pictureClick % 25 === 0) {
            revealed++;
            const index = Math.min(revealed, comments.length - 1);
            messiText.textContent = comments[index];
        }

        agrandirImage(picture, 1 + pictureClick / 10);
    
        if (pictureClick >= 100){
            picture.classList.add('inactive');
            messiText.classList.add('yell');
            messiText.textContent = "STOP";
        }
    }
    });

    messiText.addEventListener('click', () => {
        if(messiText.classList.contains('yell')) {
            form.submit();
        }
    })

  // Affiche la photo une fois que le jeu a "commencé"
  const interval = setInterval(() => {
    if (document.body.classList.contains('started')) {
      picture.classList.add('visible');
      clearInterval(interval);
    }
  }, 1000);
});
