//Para el comportamiento de las ventanas (Mostrar) 
function mostrarVentana(descripcion) { 
    document.getElementById('Ventana-texto').innerText = descripcion;
    document.getElementById('Ventana').style.display = 'block';
    document.getElementById('Ventana-').style.display = 'block';
}
 
function cerrarVentana() {
    document.getElementById('Ventana').style.display = 'none';
    document.getElementById('Ventana-').style.display = 'none';
}