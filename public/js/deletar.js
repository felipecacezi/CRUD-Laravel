jQuery(document).ready(function(){

    jQuery(".btn-delete").on('click',function(){
        confirmDeletar(this);
    })

});


function confirmDeletar(element){

    let url  = jQuery(element).data('url')
    let line = jQuery(element).data('line')

    if(confirm('Deseja mesmo deletar?')){
        deletar(url, line);
    } else {
        return false
    }

}

function deletar(url, line){

    jQuery.ajax({
        url  : url,
        type : 'delete',        
        data : {
            '_token' : jQuery("[name='_token']").val()
        },success : function(ret){


            window.location.href="/books";

            // let retorno = JSON.parse(ret)

            // if(retorno.status == "ok"){
            //     jQuery(line).remove();
            //     alert("Registro deletado com sucesso!");
            // } else {
            //     alert("Ocorreu um erro ao deletar");
            // }

        }
    })

}