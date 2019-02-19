$("#botoncito").click(function() {
  Swal.fire({
    title: '<strong>TERMINOS Y CONDICIONES</strong>',
    type: 'info',
    html: '<p class="text-justify ml-3 mr-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using , making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </p>',
    showCloseButton: true,
    focusConfirm: true,
    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK!',
    confirmButtonAriaLabel: 'Thumbs up, great!',
  })
})
/* alert para eliminar objetos */

function deleteAlert(objeto='registro'){
  Swal.fire({
    title: '¿Estas seguro?',
    text: "No podras recuperar la información borrada",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#2dce89',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, borralo',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.value) {
      Swal.fire(
        '¡Borrado!',
        `${objeto} eliminado correctamente`,
        'success'
      )
    }
  })
}

/* alert para guardar objetos */

function savedAlert(objeto='Registro'){
  Swal.fire(
  '¡Correcto!',
  `${objeto} guardado correctamente`,
  'success'
  )
}

/* alert para modificar objetos */

function modifyAlert(objeto='Registro'){
  Swal.fire(
  '¡Correcto!',
  `${objeto} modificado correctamente`,
  'success'
  )
}

function cleanSelectedRows(){
  for (var i = 0; i < 11; i++) {
      $(`tr#${i}`).removeClass('selectedRow');
  }
}

function selectedRow(id){

  if($(`tr#${id}`).hasClass('selectedRow')){

    $(`tr#${id}`).removeClass('selectedRow');
  }else{

    cleanSelectedRows()

    $(`tr#${id}`).addClass('selectedRow');
  }
}

function getCustomDate(){
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1;

  var yyyy = today.getFullYear();
  if (dd < 10) {
    dd = '0' + dd;
  }
  if (mm < 10) {
    mm = '0' + mm;
  }
  var today = dd + '/' + mm + '/' + yyyy;
  $('.datepicker').val(`${today}`);
}

getCustomDate()
