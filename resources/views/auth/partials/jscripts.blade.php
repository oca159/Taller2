<script>
    var id;
    $(document).ready(function(){
        $('#example').dataTable( {
            "order": [[ 3, "desc" ]],
            "language": {
                "url": "{{asset('/js/dataTables.spanish.lang')}}"
            }
        } );
    });
    $(document).on('click', '.libro' ,function(e){
        $('.libro.selected').each(function(){
            $(this).removeClass('selected');
        });
        
        id = $(this).attr('id');
        $(this).addClass('selected');
        $('#ver').addClass('blue-grey').removeClass('disabled');

    });
    $(document).on('click', '.paginate_button', function(e){
        $('#ver').addClass('disabled').removeClass('blue-grey');    
        $('.libro .selected').each(function(){
            $(this).removeClass('selected');
        });
    });
    $(document).on('click','#ver',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{
            console.log(id);
            var url  = '{!! url("json_libro/' + id +'")!!}';
            $.get(url, function(result){
                $('#titulo').html('<div class="valign-wrapper"><i class="mdi-action-description medium"></i>'+result.titulo);
                $('#book_titulo').html('<strong>Titulo: </strong>'+result.titulo);
                $('#book_editorial').html('<strong>Editorial: </strong>'+result.editorial);
                $('#book_edicion').html('<strong>Edicion: </strong>'+result.edicion);
                $('#book_autor').html('<strong>Autor: </strong>'+result.autor);
                $('#book_idioma').html('<strong>Idioma: </strong>'+result.idioma);
                $('#book_no_paginas').html('<strong>Numero de paginas: </strong>'+result.no_paginas);
                $('#book_codigo').html('<strong>Codigo: </strong>'+result.codigo);
                $('#book_ejemplares').html('<strong>Numero de ejemplares: </strong>'+result.no_ejemplares);
                $('#book_disponibles').html('<strong>Libros disponibles: </strong>'+result.disponibles);
                $('#book_descripcion').html('<strong>Descripcion: </strong>'+result.descripcion);
                
                $('#modal1').openModal();
            }).fail(function(){
                alert('Error');
            });
        }
    });
</script>