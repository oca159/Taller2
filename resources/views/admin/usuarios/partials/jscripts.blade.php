<script>
    $(document).ready(function() {
        $('#telefono').numeric();
    });
    $(document).on('click','#eliminar',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{
            var url  = '{!! url("json_usuario/' + id +'")!!}';
            $.get(url, function(result){
                $('#modal_delete_body').html('¿Seguro deseas eliminar al usuario: <strong>'+result.nombre + ' ' +  result.apellidos+'</strong>?');
                $('#modal_delete').openModal();
            }).fail(function(){
                alert('Error');
            });
        }
    });

    $(document).on('click','#ver',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{

            var url  = '{!! url("json_usuario/' + id +'")!!}';
            $.get(url, function(result){
                $('#titulo').html('<div class="valign-wrapper"><i class="mdi-social-person medium"></i>'+result.nombre + ' ' +  result.apellidos);
                $('#usuario_full_name').html('<strong>Nombre: </strong>'+result.nombre + ' ' +  result.apellidos);
                $('#usuario_email').html('<strong>Correo electrónico: </strong>'+result.email);
                $('#usuario_phone').html('<strong>Telefono: </strong>'+result.telefono);
                $('#usuario_address').html('<strong>Direccion: </strong>'+result.direccion);
                $('#modal1').openModal();
            }).fail(function(){
                alert('Error');
            });
        }
    });
</script>