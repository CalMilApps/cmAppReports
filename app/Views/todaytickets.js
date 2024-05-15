$(document).ready(function() {
    // Hacer una solicitud AJAX al servidor para obtener el número de tickets de hoy
    $.ajax({
        url: '/tickets_ci4/public/dashboard', // Reemplaza esta URL con la ruta correcta en tu aplicación
        method: 'GET',
        success: function(response) {
            // Actualizar el contenido del elemento con el número de tickets de hoy
            $('#todayTicketsCount').text(response.count);
        },
        error: function(xhr, status, error) {
            console.error('Error al obtener el número de tickets de hoy:', error);
        }
    });
});
