
function Subscribe() {	
		var mail = document.getElementById('EmailSubscribe').value;
		if (!mail){
			alert("Por Favor digite um e-mail válido");
			return false;
		}
	  $.ajax({
	  url:'php/mail.php',
	  type:'POST',
	  data:{'email':mail},
      complete: function (response) {
        alert(response.responseText);		
      },
      error: function () {
          alert('Erro');
      }
  });
  
  return false;
}


function Planilha(){
		var nome = document.getElementById('Nome').value;
		var mail = document.getElementById('Email-1').value;
		var telefone = document.getElementById('Telefone').value;
		
		if (!mail){
			alert("Por Favor digite um e-mail válido");
			return false;
		} else if (!nome){
			alert("Por Favor digite um nome válido");
			return false;
		}else if (!telefone){
			alert("Por Favor digite um telefone válido");
			return false;
		}
		
	  $.ajax({
	  url:'php/sheets.php',
	  type:'POST',
	  data:{'email':mail,'nome':nome,'telefone':telefone},
      complete: function (response) {
        alert(response.responseText);
		$( "#closeModalBtn" ).click();
	      },
      error: function () {
          alert('Erro');
      }
		}); 

  return false;
}


function resetModal(){
		document.getElementById('Nome').value='';
		document.getElementById('Email-1').value='';
		document.getElementById('Telefone').value='';
}