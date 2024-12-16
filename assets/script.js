document.getElementById('signup-form').addEventListener('submit', function(event) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const email = document.getElementById('email').value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (!emailPattern.test(email)) {
        alert("L'email n'est pas valide.");
        event.preventDefault();
    }

    if (password !== confirmPassword) {
        alert("Les mots de passe ne correspondent pas.");
        event.preventDefault();
    }

    if (password.length < 8) {
        alert("Le mot de passe doit contenir au moins 8 caractères.");
        event.preventDefault();
    }
});
