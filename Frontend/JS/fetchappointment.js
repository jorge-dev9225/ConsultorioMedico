
    document.addEventListener("DOMContentLoaded", () => {
        const form = document.getElementById("appointmentsForm");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(form);

            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });

            axios.post("http://127.0.0.1:8000/api/appointments", data, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                alert("Turno solicitado correctamente ✅");
                form.reset();
            })
            .catch(error => {
                console.error(error);
                alert("Error al solicitar el turno ❌");
            });
        });
    });


