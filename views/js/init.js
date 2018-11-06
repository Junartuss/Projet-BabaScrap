(function($){
  $(function(){

    $('.sidenav').sidenav();

  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function(){
   $('.modal').modal();
   $('select').formSelect();
 });

 function verif_nombre(champ)
{
var chiffres = new RegExp("[0-9]");
var verif;
var points = 0;

for(x = 0; x < champ.value.length; x++)
	{
      		verif = chiffres.test(champ.value.charAt(x));
			if(champ.value.charAt(x) == "."){points++;}
      		if(points > 1){verif = false; points = 1;}
  			if(verif == false){champ.value = champ.value.substr(0,x) + champ.value.substr(x+1,champ.value.length-x+1); x--;}
	}
}
