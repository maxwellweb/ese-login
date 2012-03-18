// JavaScript Document para actividades

$(document).ready(function(){
	  $('#actgenerar').show();
      $('#alerta').show();
	                 /* generar*/
               $('.generarProd').live("click", function() {
               var id_pro = $('#id_pro').val();
               var nombre = $('#nombre_prod').val();
               var categoria = $("select#categoria_prod").val();
               var subcat = $('select#subcategoria_prod').val();
               var contenido = $('#textarea_prod').val();
               var portada = $('#portada_pro:checked').length == 1;
               var precio = $('#precio_prod').val();
               var data = 'id_producto='+id_pro+'&nombre_prod='+nombre+'&id_cat_prod='+categoria+'&id_subcat_prod='+subcat+'&contenido_prod='+contenido+'&portada_prod='+portada+'&precio_prod='+precio;
                $.ajax({
                type: "POST",
                url: "productoGenerar.php",
                data: data,
                dataType: "json",
                cache: false,
                success: function(resp){
                    if(!resp.error){
                        $('#alerta').hide();
                        $('#upimagen').show();
                        $('#imgWrapper').show();
                        $('#actgenerar').hide();
                        $('#actguardar').show(); 
                        var rs = '<div class="alert-message info">'+
                                    '<a class="close" href="#">×</a>'+
                                    '<p><strong>El Producto</strong>'+
                                    ' se genero corractamente'+
                                    ' </div>';
                        $('.done').show().html(rs);
                    } else {
                        alert("Error!");
                    }
                    
                    
                }
                });/*fin ajax generar*/
               });/*fin generarProd*/
               $('#fileInput').uploadify({
                   'uploader'   :   'images/uploadify.swf',
                   'script'     :   'Puploader.php',
                   'cancelImg'  :   'images/cancel.png',
                   'folder'     :   'uploads',
                   'buttonText' :   'Subir imagenes',
                   'fileDesc'	:   'jpg, gif',
                   'fileExt'	:   '*.jpg;*.gif',
                   'sizeLimit'  : '512000', //max size bytes - 500kb
                   'auto'       :   true,
                   'onComplete' : function(event, queueID, fileObj, response, data) {
 		    /*$('#imgWrapper').append(response);*/
                    var id_pro = $('#id_pro').val();
                    var tabla = 'productos';
                    var data = 'id_pro='+id_pro+'&tabla='+tabla+'&nomimg='+fileObj.name;
                    $.post('_insertimg.php', data, function(info){
                        alert(info);
                    });
		}			   
	});
	$(function(){
		
		var config = {
		toolbar:
		[
			['Source', '-', 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', 'Smiley', '-'],
                        ['PasteText', 'Image'],
			['UIColor']
		],                  
		skin: 'kama',
                
                extraPlugins : 'docprops'
                
                };
                
              
                
                $('#textarea_act').ckeditor(config);
		  		$('.tabs').tabs(); 
		});
		
		    $('.topbar').dropdown()
            
            $(".alert-message.info").alert('close')