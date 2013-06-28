
/*******************************************
              OBJETO AJAX                 
********************************************/

function recargarCategorias() {
        var cosa = form1.catego.value;
        $.ajax({url:"pag/campoquery.php?&catego="+cosa, cache:false}).done(function(cosa){

tipos.innerHTML = cosa;
        })
    }

