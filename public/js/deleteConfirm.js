function deleteConfirm(message, id) {
    Swal.fire({
        title: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Obtiene el formulario por su ID
            const form = document.getElementById('delete-form');
            // Actualiza la URL del formulario con el ID de la categoría
            //form.action = form.action.replace(':category', id);
            // Envía el formulario
            form.submit();
        }
    });
}