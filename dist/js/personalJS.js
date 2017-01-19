$(document).ready(function () {
    
    $("#listaprocedimento").change(function () {
        
        var val = $(this).val();
        


        if (val == "4") {

        	// enable sub processo select list
        	$('#listasubprocesso').prop('disabled', false);

        	// list sub processos on select list
            $("#listasubprocesso").html("<option value='sub1cit'>sub processo do cit</option><option value='sub2cit'>sub processo 2 cit</option>");
        } 

        else if (val == "3") {

        	// enable sub processo select list
        	$('#listasubprocesso').prop('disabled', false);
            
        	// list sub processos on select list
            $("#listasubprocesso").html("<option value='naoaplicavel'>Não aplicável</option><option value='Pré Impressão'>Pré impressão</option><option value='Impressão'>Impressão</option><option value='Acabamentos'>Acabamentos</option><option value='Controlo de qualidade'>Controlo de qualidade</option><option value='Expedição'>Expedição</option><option value='Gestão de Armazém'>Gestão de Armazém</option>");
        } 

    });

});