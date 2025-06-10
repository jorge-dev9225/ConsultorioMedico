document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();

    const formData = new FormData(loginForm);

    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    axios.post("http://127.0.0.1:8000/api/login", data, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        loginForm.reset();
        window.location.href = "http://192.168.1.28:3000/"
    })
    .catch(error => {
        console.error(error);
        alert("Error al iniciar sesion ❌");
    });
});
});