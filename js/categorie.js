
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
})
