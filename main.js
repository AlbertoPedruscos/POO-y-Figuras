var selectElement = document.getElementById('figura');
var lado1 = document.getElementById('lado1');
var inputElement = document.getElementById('lado2');
var selectedValue;

// Función que se ejecutará cuando cambie el valor del select
function actualizarValor() {
    // Obtener el valor seleccionado y asignarlo a la variable
    selectedValue = selectElement.value;

    if (selectedValue=='rec' || selectedValue=='tri'){
        // Deshabilitar el input
        inputElement.disabled = false;
    }
    else{
        inputElement.disabled = true;
        inputElement.value = ''
    }
}

// Agregar un evento de cambio al elemento select
selectElement.addEventListener('change', actualizarValor);

// Llamar a la función inicialmente para obtener el valor inicial
actualizarValor();

function validar() {
    var validad = true;

    if (selectElement.value === '') {
        selectElement.classList.add('fallo');
        validad = false;
    } else {
        selectElement.classList.remove('fallo');
    }

    if (lado1.value === '' || isNaN(parseFloat(lado1.value))) {
        lado1.classList.add('fallo');
        validad = false;
    } else {
        lado1.classList.remove('fallo');
    }

    if ((selectedValue === 'rec' || selectedValue === 'tri') && (inputElement.value === '' || isNaN(parseFloat(inputElement.value)))) {
        inputElement.classList.add('fallo');
        validad = false;
    } else {
        inputElement.classList.remove('fallo');
    }

    return validad;
}


document.addEventListener('DOMContentLoaded', function() {
    // Agrega un evento al formulario para manejar la solicitud Ajax cuando se envía
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe normalmente

        // Obtiene los valores del formulario
        var figura = document.getElementById('figura').value;
        var lado1 = document.getElementById('lado1').value;
        var lado2 = document.getElementById('lado2').value;
        var imagen = document.getElementById("fig");

        // Realiza la solicitud Ajax
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'figuras.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Envía los datos al servidor
        var data = "figura=" + figura + "&lado1=" + lado1 + "&lado2=" + lado2;
        xhr.send(data);

        // Maneja la respuesta del servidor
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Actualiza el contenido del elemento con el ID 'resultado'
                    document.getElementById('tex').innerHTML = response.info;
                    if (figura=='tri'){
                        imagen.src = "fotos/triangulo.png";
                    }
                    else if (figura=='cua'){
                        imagen.src = "fotos/cuadrado.jpg";
                    }
                    else if (figura=='rec'){
                        imagen.src = "fotos/rectangulo.png";
                    }
                    else if (figura=='cir'){
                        imagen.src = "fotos/circulo.png";
                    }
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false,
                        width: '300px',
                        customClass: {
                            popup: 'custom-popup-class'
                        }
                    });
                } else {
                    // Maneja cualquier error si es necesario
                    console.error('Error en la respuesta del servidor');
                }
            }
        };
    });
});


