/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var successTitle = [
    'Esta todo hecho!',
    'Ha resultado genial!',
    'Todo bien, todo correcto!',
    '¿Mejor? imposible!',
    'Todo listo!',
    'Esta listo para ti!'
];
var errorTitle = [
    'Oops, algo salio mal!',
    'Ay no, esto no deberia pasar!',
    'Lo siento, algo salio mal!',
    '¿Error? si, así es!',
    'Oh no, Algo salio mal!'
];
//Definir las clases y configuración para los modals de "Swal" los cuales mostraran los mensajes.
const swal2 = Swal.mixin({
    width: '45rem',
    heightAuto: false,
    customClass: {
        title: 'swal-title',
        popup: 'swal-modal',
        content: 'swal-text mb-2',
        confirmButton: 'ui positive right labeled icon button thin-font',
        cancelButton: 'ui negative button',
    },
    buttonsStyling: false
});
