function toggleVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
function checkEmail() {
    let email = document.getElementById('emailfld').value;
    let statusSpan = document.getElementById('emailStatus');
    if (email.length === 0) {
        statusSpan.innerHTML = "";
        return;
    }
    let formData = new FormData();
    formData.append('email', email);
    fetch('../../controller/checkemailControl.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === "taken") {
            statusSpan.style.color = "red";
            statusSpan.innerHTML = "User already exists!";
        } else {
            statusSpan.style.color = "green";
            statusSpan.innerHTML = "Email is free to use";
        }
    })
    .catch(error => console.error('Error:', error));
}