<script>
    $(document).ready(function() {
        $('#telefono').numeric();
    });
    $(document).on('click','#eliminar',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{
            var url  = '{!! url("json_cuenta/' + id +'")!!}';
            $.get(url, function(result){
                $('#modal_delete_body').html('¿Seguro deseas eliminar la cuenta de: <strong>'+result.nombre + ' ' +  result.apellidos+'</strong>?');
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

            var url  = '{!! url("json_cuenta/' + id +'")!!}';
            $.get(url, function(result){
                $('#titulo').html('<div class="valign-wrapper"><i class="mdi-social-person medium"></i>'+result.nombre + ' ' +  result.apellidos+'</div>');
                $('#cuenta_full_name').html('<strong>Nombre: </strong>'+result.nombre + ' ' +  result.apellidos);
                $('#cuenta_email').html('<strong>Correo electrónico: </strong>'+result.email);
                $('#cuenta_phone').html('<strong>Telefono: </strong>'+result.telefono);
                $('#cuenta_address').html('<strong>Direccion: </strong>'+result.direccion);
                $('#cuenta_type').html('<strong>Tipo: </strong>'+result.tipo);
                $('#modal1').openModal();
            }).fail(function(){
                alert('Error');
            });
        }
    });
</script>