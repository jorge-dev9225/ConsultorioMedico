document.addEventListener("DOMContentLoaded", () => {
    const contactsForm = document.getElementById("contactsForm");

    contactsForm.addEventListener("submit", function (e) {
        e.preventDefault();

    const formData = new FormData(contactsForm);

    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    axios.post("http://127.0.0.1:8000/api/contacts", data, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        alert("Mensaje enviado correctamente ✅");
        contactsForm.reset();
    })
    .catch(error => {
        console.error(error);
        alert("Error al enviar el mensaje ❌");
    });
});
});