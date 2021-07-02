/*$(document).ready(function(){
    $('#search').focus()
  
    $('#search').on('keyup', function(){
      var search = $('#search').val()
      $.ajax({
        type: 'POST',
        url: 'Vista/ListaPersonal1.php',
        data: {'primerNombre': primerNombre,
               'segundoNombre': segundoNombre,
               'apellidoPaterno': apellidoPaterno,
               'apellidoMaterno': apellidoMaterno,
               'ci': ci
        
    
        },
      })
      .done(function(resultado){
        $('#result').html(resultado)
      })
      .fail(function(){
        alert('No se Encontraron  :(')
      })
    })
  })*/

  $('#tabla').DataTable({
    "ordering": false,
    /*"columnsDefs": [
        {"width":"50%","targets":0}
    ]*/
});
