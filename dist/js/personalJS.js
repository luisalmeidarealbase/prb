$(document).ready(function () {
    
    $("#listaprocedimento").change(function () {
        
        var val = $(this).val();
        


        if (val == "cit") {

        	// enable sub processo select list
        	$('#listasubprocesso').prop('disabled', false);

        	// list sub processos on select list
            $("#listasubprocesso").html("<option value='sub1cit'>sub processo do cit</option><option value='sub2cit'>sub processo 2 cit</option>");
        } 

        else if (val == "producao") {

        	// enable sub processo select list
        	$('#listasubprocesso').prop('disabled', false);
            
        	// list sub processos on select list
            $("#listasubprocesso").html("<option value='naoaplicavel'>Não aplicável</option><option value='preimpressao'>Pré impressão</option><option value='impesssao'>Impressão</option><option value='acabamentos'>Acabamentos</option><option value='controloqualidade'>Controlo de qualidade</option><option value='expedicao'>Expedição</option><option value='gestaoarmazem'>Gestão de Armazém</option>");
        } 

    });

});