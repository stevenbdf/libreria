const enviarCorreo = async () => {
    const correo = document.getElementById('correo')
    const response = await fetch('../../core/helpers/correoAdmin.php', {
        method: 'POST',
        body: JSON.stringify({ correo: correo.value })
    });
    const { message } = await response.json();
    if (response.status === 200) {
        swal('Exito', message, 'success')
    } else {
        swal('Error', message, 'error')
    }
}