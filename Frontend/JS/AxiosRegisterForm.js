document.addEventListener("DOMContentLoaded", () => {
    const registerForm = document.getElementById("registerForm");

    registerForm.addEventListener("submit", function (e) {
        e.preventDefault();

    const formData = new FormData(registerForm);

    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    axios.post("http://127.0.0.1:8000/api/register", data, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        alert("Se ha registrado correctamente ✅");
        registerForm.reset();
    })
    .catch(error => {
        console.error(error);
        alert("Error al registrarse❌");
    });
});
});