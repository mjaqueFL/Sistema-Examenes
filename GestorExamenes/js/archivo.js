function hidenop(vall){
	if(vall == '1' || vall=='2'){
		$("#nop").css('display','block');
	}else{
	$("#nop").css('display','none');
	}
}
function abrirventana() {
	window.open("http://www.desarrolloweb.com" , "ventana1" , "width=120,height=300,scrollbars=NO")
}