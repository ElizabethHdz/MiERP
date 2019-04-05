(function ($) {
    $.fn.showHide = function (options) {
		//default vars for the plugin
        var defaults = {
            speed: 1000,
			easing: '',
			changeText: 0,
			showText: 'Show',
			hideText: 'Hide'	
        };
        var options = $.extend(defaults, options);
        $(this).click(function () {	     
             $('.toggleDiv').slideUp(options.speed, options.easing);	
			 //esta variable almacena en qué botón has hecho clic
             var toggleClick = $(this);
		     // Esta lee el atributo rel del botón para determinar qué ID de div para alternar
		     var toggleDiv = $(this).attr('rel');
		     //Aquí alternamos mostrar / ocultar la división correcta a la velocidad correcta y usar el efecto de suavizado.
		     $(toggleDiv).slideToggle(options.speed, options.easing, function() {
		     // esto solo se dispara una vez que se completa la animación
			 if(options.changeText==1){
		     $(toggleDiv).is(":visible") ? toggleClick.text(options.hideText) : toggleClick.text(options.showText);
			 }
              });
		  return false;
		   	   
        });

    };
})(jQuery);