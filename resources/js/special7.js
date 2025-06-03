document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("secret-button");
    const form = document.getElementById("special-form");

    btn.addEventListener("click", () => {
        // Animation de victoire
        document.getElementById("victory-text").style.display = "block";

        setTimeout(() => {
            form.submit();
        }, 2000);
    });
});
