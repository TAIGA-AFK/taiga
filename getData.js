// const getParameterByName = (name) => {
//     const urlParams = new URLSearchParams(window.location.search);
//     return urlParams.get(name);
// }

// const cargarDatos = () => {
//     const user = getParameterByName('usuario');
//     console.log(user);

//     // document.getElementById('name').innerText = user['nombre'];
//     try {
//         const userJson = JSON.parse(user);
//         console.log(userJson);
//     } catch (error) {
//         console.error('Error',error);
//     }
// }

// window.onload = function() {
//     cargarDatos();
// };

// Obtener la URL actual
var urlParams = new URLSearchParams(window.location.search);

// Obtener el valor del parámetro 'usuario'
var userDataJson = urlParams.get('usuario');

// Convertir el JSON a objeto JavaScript
var userData = JSON.parse(userDataJson);

// Ahora userData contiene el objeto con la información del usuario
console.log(userData);

document.getElementById('name').innerText = userData['email'];
