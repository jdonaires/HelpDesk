with(document.login){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && Email.value==""){
			ok=false;
			alert("Debe escribir un nombre de usuario");
			Email.focus();
		}
		if(ok && password.value==""){
			ok=false;
			alert("Debe escribir su password");
			password.focus();
		}
		if(ok){ submit(); }
	}
}
