$(document).ready(function () {
    
    $("#listaprocedimento").change(function () {
        
        var val = $(this).val();
        


        if (val == "4") {

        	// enable sub processo select list
        	$('#listasubprocesso').prop('disabled', false);

        	// list sub processos on select list
            $("#listasubprocesso").html("<option value='naoaplicavel'>Não aplicável</option><option value='Desenvolvimento e Arte Final'>Desenvolvimento e Arte Final</option>");
        } 

        else if (val == "3") {

        	// enable sub processo select list
        	$('#listasubprocesso').prop('disabled', false);
            
        	// list sub processos on select list
            $("#listasubprocesso").html("<option value='naoaplicavel'>Não aplicável</option><option value='Pré Impressão'>Pré impressão</option><option value='Impressão'>Impressão</option><option value='Acabamentos'>Acabamentos</option><option value='Controlo de qualidade'>Controlo de qualidade</option><option value='Expedição'>Expedição</option><option value='Gestão de Armazém'>Gestão de Armazém</option>");
        } 
        else if (val == "5") {

            // enable sub processo select list
            $('#listasubprocesso').prop('disabled', false);
            
            // list sub processos on select list
            $("#listasubprocesso").html("<option value='Acompanhamento Pós Venda'>Acompanhamento Pós Venda</option><option value='Prospecção e Vendas'>Prospecção e Vendas</option><option value='Orçamentação e Encomenda'>Orçamentação e Encomenda</option>");
        } 
        else if (val == "6") {

            // enable sub processo select list
            $('#listasubprocesso').prop('disabled', false);
            
            // list sub processos on select list
            $("#listasubprocesso").html("<option value='Gestão STIC'>Gestão STIC</option><option value='Gestão de Infra-Estruturas'>Gestão de Infra-Estruturas</option>");
        } 
        else{
            //$('#listasubprocesso').prop('disabled', true);
            $('#listasubprocesso').html("<option value='Não aplicável'>Não Aplicável</option>");
        }

    });

});