
function buscarCliente(){

alert("alerta");
if(document.getElementsByName("create")!=""){
        $(document).ready(function() {  
          
            $.post('../../business/clienteaccion/clienteAccion.php', {
                    accion: 'todo',
                      cedula: '',

            }, function(responseText) {
                
                   array =  JSON.parse(responseText);
                    for(i =0 ;i<array.length;i++){
                        alert(array[0]);
                        alert(array[1]);
                        document.getElementById("bCliente").value= array[i].clienteid;
                    } 
             
                
            });
        });
	}
	
}