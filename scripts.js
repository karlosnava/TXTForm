
// PERMITIR SOLO NUMEROS
function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}

// INSERTAR
$("#inserter").bind("submit",function(){
  var btnEnviar = $("#save");
  $.ajax({
    type: $(this).attr("method"),
    url: $(this).attr("action"),
    data: $(this).serialize(),
    beforeSend: function(){
      btnEnviar.attr("disabled","disabled");
      btnEnviar.html('Guardando...');
    },
    complete:function(data){
      btnEnviar.html("Guardar");
      btnEnviar.removeAttr("disabled");
    },
    success: function(data){
      $('.info').html(data);

      $('#refresh').load(" #refresh > *");
    },
    error: function(data){
      alert("Hubo un error.");
    }
  });
  return false;
});


// ELIMINAR
function deleter()
{
	$(".deleter").each(function ()
	{
		$(this).click(function ()
		{
			var key = $(this).attr("key");
			var row = $(this).parent().parent();

			// ROW DESTROYER
			$(row).addClass("animate__animated animate__bounceOut");
			$(row).on('animationend', () => {
			  $(row).remove();
			});

			var parametros = {
				"key" : key
	    };

			$.ajax({
	      url: "./actions/delete.php",
	      type: "POST",
		    data: parametros,

	      success: function(response){
	      	$('.info').html(`<div style='color:green'>El registro con la llave <b>${key}</b> ha sido eliminado</span>`);
	      },

	      error: function(data){
	        alert("Hubo un error.");
	      },
	    });
		});
	});
} deleter();

$('.right').bind('DOMSubtreeModified', function(){
  deleter();
});
