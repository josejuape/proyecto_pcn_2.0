
function addcarrito(){
    var cant=$("#cantidad").val();
    var kg=$("#kilaje").val();
    var param={
        "cantidad":cant,
        "kilaje":kg
    };
    $.ajax({
        type:'post',
        url:'../compras/addcarrito',
        data:param,
        success:function(data){
            var dataJson = eval(data);
            var count=1;
            $(".row_delete").remove();
            for (var i in dataJson) {
                var codigo = dataJson[i].codigo;
                var cantidad = dataJson[i].cantidad;
                var kilaje=dataJson[i].kilaje;
                var subtotal=dataJson[i].subtotal;
                var row ='<tr id="'+codigo+'" class="row_delete"><td><span id="num">'+count+'</span></td><td><input type="text" name="cantidad'+count+'" id="cantidad'+codigo+'" class="textbox" value="'+cantidad+'" disabled="true" ></td>'+
                    '<td><input type="text" name="kilaje'+count+'" id="kilaje'+codigo+'" class="textbox" value="'+kilaje+'" disabled="true" ></td><td><span id="subtotal'+codigo+'">'+subtotal+'</span></td>'+
                    '<td><a id="btneditar'+codigo+'" class="link_editar" href="javascript:modificar_row(&quot;'+codigo+'&quot;);"><img src="../img/iconos/editar.png" height="20" alt="modficar" title="Modificar" /></a></td><td><a class="link_editar" href="javascript:eliminar_row(&quot;'+codigo+'&quot;);"><img src="../img/iconos/eliminar.gif" height="20" alt="eliminar" title="Eliminar" /></a></td></tr>';
                $("#tbldata").append(row);
                count=count+1;
            }
            var rowt='<tr class="row_delete"><td><span id="num">'+count+'</span></td><td><input type="text" name="cantidad" id="cantidad" class="textvacio" ></td>'+
                    '<td><input type="text" name="kilaje" id="kilaje" class="textvacio" ></td><td><input type="button" name="btn" value="Agregar" id="btnagregar" class="btn_add" onclick="addcarrito();"></td>'+
                    '<td></td><td></td></tr>';
                $("#tbldata").append(rowt);
        }
        
    });    
    
}

function modificar_row(id){
    $("#cantidad"+id).css({background:'#FFF',border:'1px solid #666'}).attr("disabled",false).focus();
    $("#kilaje"+id).css({background:'#FFF',border:'1px solid #666'}).attr("disabled",false);
    
    $("#btneditar"+id).html("Actualizar").removeClass("link_editar").addClass("btn_editar").attr("href","guardar_modificacion("+id+");");
}

function guardarCarrito(){
    $.ajax({
        type:'post',
        url:'../compras/guardarcarrito',
        success:function(){
            
        }
    });
}

