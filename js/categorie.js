
// Variable globale pour stocker une référence vers la fenêtre ouverte
var fenetreOuverte;
var fenetre;
function ouvrirFenetre(fenetre)
{
  fenetreOuverte = window.open('fenetre');
}
function fermerFenetreOuverte()
{
  fenetreOuverte.close();
}

function fermerFenetreCourante()
{
  window.close();
}

$(document).ready(function() {

    /*Zoom pour la planÃ¨te*/
    $( ".propos" ).mouseover(function() {
      $('.propos > div > img').css('width', '30%');
    });
    $( ".propos" ).mouseleave(function() {
      $('.propos > div > img').css('width', '20%');
    });

    $( ".projet" ).mouseover(function() {
      $('.projet > div > img').css('width', '30%');
    });
    $( ".projet" ).mouseleave(function() {
      $('.projet > div > img').css('width', '20%');
    });

    $( ".article" ).mouseover(function() {
      $('.article > div > img').css('width', '30%');
    });
    $( ".article" ).mouseleave(function() {
      $('.article > div > img').css('width', '20%');
    });

    $( ".contact" ).mouseover(function() {
      $('.contact > div > img').css('width', '30%');
    });
    $( ".contact" ).mouseleave(function() {
      $('.contact > div > img').css('width', '20%');
    });



    /*CONTACT*/
	// Test for placeholder support
    $.support.placeholder = (function(){
        var i = document.createElement('input');
        return 'placeholder' in i;
    })();

    if($.support.placeholder) {
        $('.form-label').each(function(){
            $(this).addClass('js-hide-label');
        });

        // Code for adding/removing classes here
        $('.form-group').find('input, textarea').on('keyup blur focus', function(e){

            // Cache our selectors
            var $this = $(this),
                $parent = $this.parent().find("label");

            if (e.type == 'keyup') {
                if( $this.val() == '' ) {
                    $parent.addClass('js-hide-label');
                } else {
                    $parent.removeClass('js-hide-label');
                }
            }
            else if (e.type == 'blur') {
                if( $this.val() == '' ) {
                    $parent.addClass('js-hide-label');
                }
                else {
                    $parent.removeClass('js-hide-label').addClass('js-unhighlight-label');
                }
            }
            else if (e.type == 'focus') {
                if( $this.val() !== '' ) {
                    $parent.removeClass('js-unhighlight-label');
                }
            }
        });
    }
});
