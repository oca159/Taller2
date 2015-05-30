<script>
    $(document).on('click','#eliminar',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{
            var url  = '{!! url("json_libro/' + id +'")!!}';
            $.get(url, function(result){
                $('#modal_delete_title').html('Confirmacion');
                $('#modal_delete_body').html('¿Seguro deseas eliminar el libro: <strong>'+result.titulo+'</strong>?');
                $('#modal_delete').openModal();
            }).fail(function(){
                alert('Error');
            });
        }
    });
    $(document).ready(function(){
        $('#li_prestar').hide();
        $('#no_ejemplares').numeric();
        $('#no_paginas').numeric();
        $('#edicion').numeric();
        $(".button-collapse").sideNav();
        $(".dropdown-button").dropdown({hover:false});
        $('select').material_select();
    });
    $(document).on('click','#ver',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{

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

    $(document).on('click', '#agregar', function(e){
        var id_carrito = $(this).data('id');
        var str = '<li class="center" id="'+ id_carrito +'">'+ id_carrito +'</li>';
        if( $(this).hasClass('red') ){
            n_libros--;
            if( n_libros == 0 )
                $('#li_prestar').hide();
            $(this).attr('data-tooltip', 'Agregar');
            $(this).addClass('green').removeClass('red');
            $('#carrito').find('#'+id_carrito).remove();
        }
        else{
            n_libros++;
            $(this).attr('data-tooltip', 'Eliminar');
            $(this).addClass('red').removeClass('green');
            $('#carrito').append(str);
            if( n_libros == 1 )
                $('#li_prestar').show();
        }
    });

    $(document).on('click','#prestar',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{
            var json_result;
            var books = [];
            $('#carrito li').each(function(n){ 
                var codigo_libro = {
                    codigo : $(this).attr('id')
                };
                books.push( codigo_libro );
            });
            var json_data = JSON.stringify(books);
            var url  = '{!! url("json_prestamo/' + json_data +'")!!}';
            $.get(url, function(result){
                var url = '{!! url("admin/prestamos/create") !!}';
                window.location.replace(url);
            }).fail(function(){
                alert('Error');
            });
        }
    });
</script>