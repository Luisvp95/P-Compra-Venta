document.getElementById("picture").onchange = function(e) {
    // Obtener la imagen seleccionada
    var reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);

    // Actualizar la vista previa con la imagen seleccionada
    reader.onload = function() {
        var preview = document.getElementById('preview');
        preview.src = reader.result;
        document.getElementById('delete-button').style.display =
            'inline-block'; // mostrar el botón de eliminación
    };

    // Actualizar el texto de la etiqueta "label" con el nombre del archivo seleccionado
    var fileName = e.target.files[0].name;
    var label = document.querySelector('.custom-file-label');
    label.textContent = fileName;
};

document.getElementById("delete-button").onclick = function(event) {
    event.preventDefault(); // prevenir el comportamiento predeterminado del botón

    // Restablecer la vista previa y la etiqueta de archivo
    var preview = document.getElementById('preview');
    preview.src = '#';
    var label = document.querySelector('.custom-file-label');
    label.textContent = 'Seleccione una imagen';

    // Ocultar el botón de eliminación
    document.getElementById('delete-button').style.display = 'none';

    // Restablecer el valor del input de archivo
    document.getElementById('picture').value = '';
};