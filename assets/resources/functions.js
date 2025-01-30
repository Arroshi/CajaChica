


$(document).ready(function () {
  // Cuando cambia el valor del cboPais
  $("#respons_").change(function () {
    var cod_usu = $(this).val();

    // Realizar una llamada Ajax para obtener las ciudades del país seleccionado
    $.ajax({
      url: "../Controller/getArea.php",
      method: "POST",
      data: { cod_usu: cod_usu },
      success: function (area) {
        // Limpiar el cboCiudad y agregar las nuevas opciones
        var area = JSON.parse(area);
        console.log(area);
        $("#area_").empty();
        $.each(area, function (index, area) {
          $("#area_").append(
            $("<option>").text(area.desc_area).val(area.id_area)
          );
        });
      },
    });
  });

  // $("#btnCaja_add").click(function (e) {
  //   e.preventDefault();
  //   // var _data_prd = {
  //   //   btnCaja_add: true,
  //   //   usu_reg_id: $("#usu_reg_id").val(),
  //   //   tipo_partida: $("#tipo_partida").val(),
  //   //   tipo_subpartida: $("#tipo_subpartida").val(),
  //   //   beneficiario: $("#benef").val(),
  //   //   asignado: $("#asign_").val(),
  //   //   cod_apert_c_: $("#cod_apert_c_").val(),
  //   //   monto_: $("#monto_").val(),
  //   //   obs_: $("#obs_").val().toUpperCase(),
  //   //   centro_c_: $("#centro_c_").val(),
  //   //   t_moneda: $("#t_moneda").val()
  //   // };

  //   var formData = new FormData($("#form_valor")[0]);

  //   // var fileInput = $("#customFile").val();
  //   var fileInput = document.querySelector("#customFile");
  //   var file = fileInput.files[0];

  //   formData.append('file', file);
  //   // formData.append('file', JSON.stringify(file));


  //   // _data_prd.append("uploadedFiles", JSON.stringify(uploadedFiles));


  //   $.ajax({
  //     type: "POST",
  //     url: "../Controller/Add_Caja.php",
  //     // data: _data_prd,
  //     data: formData,
  //     success: function (r) {
  //       console.log(r);
  //       if (r == 405) {
  //         alert("El monto no debe ser mayor al saldo disponible en caja");
  //       } else if (r == 1) {
  //         alert("Agregado correctamente");
  //         // window.location.reload(true);
  //       } else {
  //         alert("Error al registrar, Verifique que los campos estén correctamente completos.");
  //       }
  //     },
  //   });
  //   return false;
  // });

  $("#btnCaja_add").click(function () {
    const boton = $(this);
    var _data_prd = new FormData(); // Crear un nuevo objeto FormData

    _data_prd.append('btnCaja_add', true);
    _data_prd.append('usu_reg_id', $("#usu_reg_id").val());
    _data_prd.append('tipo_partida', $("#tipo_partida").val());
    _data_prd.append('tipo_subpartida', $("#tipo_subpartida").val());
    _data_prd.append('beneficiario', $("#benef").val());
    _data_prd.append('asignado', $("#asign_").val());
    _data_prd.append('cod_apert_c_', $("#cod_apert_c_").val());
    _data_prd.append('monto_', $("#monto_").val());
    _data_prd.append('obs_', $("#obs_").val().toUpperCase());
    _data_prd.append('centro_c_', $("#centro_c_").val());
    _data_prd.append('t_moneda', $("#t_moneda").val());
    _data_prd.append('propiedad', $("#propiedad").val());

    // Obtener el archivo seleccionado
    var fileInput = document.querySelector("#customFile");
    var file = fileInput.files[0];
    _data_prd.append('file', file); // Agregar el archivo a FormData


    boton.prop("disabled", true);

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Caja.php",
      data: _data_prd, // Usar el objeto FormData como datos de la solicitud
      processData: false, // Evitar el procesamiento automático de datos
      contentType: false, // Evitar la configuración automática del tipo de contenido
      success: function (r) {
        console.log(r);
        if (r == 405) {
          alert("El monto no debe ser mayor al saldo disponible en caja");
        } else if (r == 1) {
          alert("Agregado correctamente");
          window.location.reload(true);
        } else {
          alert("Error al registrar, Verifique que los campos estén correctamente completos.");
        }
      },
      complete: function () {
        // Rehabilitar el botón después de completar el proceso
        boton.prop("disabled", false);
      },
    });
    return false;
  });

  $("#btnPlantilla_add").click(function () {
    var _data_prd = {
      btnPlantilla_add: true,
      id_caja_admin: $("#id_caja_admin").val(),
      partida_admin: $("#tipo_partida").val(),
      subpartida_admin: $("#tipo_subpartida").val(),
      benef_admin: $("#benef").val(),
      monto_admin: $("#monto_admin").val(),
      obs_admin: $("#obs_admin").val().toUpperCase(),
      centro_c_admin: $("#centro_c_").val(),
      t_moneda: $("#t_moneda").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Caja.php",
      data: _data_prd,
      success: function (r) {
        console.log(r);
        if (r == 1) {
          alert("Agregado correctamente");
          //event.returnValue = false;
          // window.location.href = "Caja-Diaria.php";
          //window.location.href = "Plantilla.php";
          window.location.reload(true);
          // } else if (r == 405) {
          //   alert("El monto no debe ser superior al saldo de caja.");
        } else {
          alert(
            "Error al registrar, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });
    return false;
  });

  $("#btnCaja_manual_add").click(function () {
    var _data_manual = {
      btnCaja_manual_add: true,
      _usu_reg_id: $("#_usu_reg_id").val(),
      _tipo_partida: $("#tipo_partida").val(),
      _tipo_subpartida: $("#tipo_subpartida").val(),
      _benef: $("#benef").val(),
      _cod_apert_c_: $("#cod_apert_c_").val(),
      _monto_: $("#monto_").val(),
      _fecha_: $("#_fecha_").val(),
      _obs_: $("#obs_").val().toUpperCase(),
      _centro_c_: $("#centro_c_").val(),
      t_moneda: $("#t_moneda").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Caja.php",
      data: _data_manual,
      success: function (r) {
        console.log(r);
        if (r == 405) {
          alert("El monto no debe ser mayor al saldo disponible en caja");
        } else if (r == 1) {
          alert("Agregado correctamente");
          window.location.reload(true);
        } else {
          alert("Error al registrar, Verifique que los campos estén correctamente completos.");
        }
      },
    });
    return false;
  });

  $("#btnUsers_add").click(function () {
    var selectedRadios = $('input[name="radio-inline"]:checked').val();

    var _data_usr = {
      btnUsers_add: true,
      cod_usu: $("#cod_usu").val(),
      nom_user_: $("#nom_user_").val().toUpperCase(),
      ape_usu: $("#ape_usu").val().toUpperCase(),
      tipo_area: $("#tipo_area").val(),
      usu_: $("#usu_").val(),
      contra_: $("#contra_").val(),
      email_usu: $("#email_usu").val(),
      radios: selectedRadios,
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Users.php",
      data: _data_usr,
      success: function (r) {
        console.log(r);
        if (r == 1) {
          alert("Agregado correctamente");
          //event.returnValue = false;

          //window.location.href = "Usuarios.php";
          window.location.reload(true);
        } else {
          alert(
            "Error al registrar, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });
    return false;
  });

  $("#btnPartida_add").click(function () {
    var _data = {
      btnPartida_add: true,
      partida: $("#nomPart").val().toUpperCase(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Partida.php",
      data: _data,
      success: function (r) {
        if (r == 1) {
          alert("Agregado correctamente");
          // event.returnValue = false;
          $("#nomPart").val("");
          updateComboBox();
          // window.location.href = "GestionPartidas.php";
          // window.location.href = "GestionPartidas.php";
        } else {
          alert(
            "Error al registrar, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });
    return false;
  });

  function updateComboBox() {
    // Realiza una nueva solicitud Ajax para obtener la lista actualizada de partidas
    $.ajax({
      type: "GET",
      url: "../Controller/getPartida.php", // Script PHP para obtener datos del cbo
      // dataType: 'json',
      success: function (response) {
        const partida = JSON.parse(response);

        for (var i = 0; i < partida.length; i++) {
          var listItem = document.createElement("option");
          listItem.value = partida[i].id;
          listItem.textContent = partida[i].desc;
          document.getElementById("tipo_partida").appendChild(listItem);
        }
      },
    });
  }

  $("#btn_SubPartida_add").click(function () {
    // Obtener elementos seleccionados
    var selectedItems = $("#public-methods").val();

    var selectedTexts = $("#public-methods option:selected")
      .map(function () {
        return $(this).text();
      })
      .get();

    var arraySelected = [];
    for (var i = 0; i < selectedItems.length; i++) {
      var valor = selectedItems[i];
      var texto = selectedTexts[i];
      var par = { valor: valor, texto: texto };
      arraySelected.push(par);
    }

    var _data = {
      btn_SubPartida_add: true,
      partida: $("#tipo_partida").val(),
      selects: arraySelected,
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Partida.php",
      data: _data,
      success: function (r) {
        console.log(r);
        if (r != "") {
          alert("Agregado correctamente");
          window.location.reload(true);
        } else {
          alert(
            "Error al registrar, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btn_relations_add").click(function () {
    // Obtener elementos seleccionados
    var selectedItems_SP = $("#public-methods-sp").val();
    var selectedItems_CC = $("#public-methods_").val();

    var selectedRadios = $('input[name="radio-inline"]:checked').val();

    var selectedRadios_benf = $(
      'input[name="radio-inline-benf"]:checked'
    ).val();

    var _data = {
      btn_relations_add: true,
      partida: $("#_part").val(),
      subpartida: $("#_subpart").val(),
      selects_SP: selectedItems_SP,
      selects_CC: selectedItems_CC,
      radios: selectedRadios,
      radios_b: selectedRadios_benf,
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Partida.php",
      data: _data,
      success: function (r) {
        console.log(r);

        if (r != "") {
          alert("Agregado correctamente");
          window.location.reload(true);
        } else {
          alert(
            "Error al registrar, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });

    return false;
  });

  /*
    $('#btnAsign_add').click(function(){
        var _data_asign_save=$('#save_asign').serialize();
        $.ajax({
            type:"POST",
            url:"../Controller/Add_Asignados.php",
            data: _data_asign_save,
            success:function(r){
                if (r==1) {
                    alert("Asignado creado correctamente.");
                    event.returnValue=false;

                    window.location.href = "GestionAsignados.php";

                }else{
                    console.log(r);
                    alert("Error al registrar, Verifique que los campos esten correctamente completos.");
                }
            }
        });
        return false;
    });*/

  $("#btn_save_centro").click(function () {
    var _data_cntr = $("#save_centro_c").serialize();

    var _data_cntr = {
      btn_save_centro: true,
      identif_centro: $("#identif_centro").val(),
      desc_centro: $("#desc_centro").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Centro_Costos.php",
      data: _data_cntr,
      success: function (r) {
        if (r == 1) {
          alert("Creado correctamente");
          event.returnValue = false;

          window.location.href = "GestionCentroCostos.php";
        } else {
          alert(
            "Error al crear, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });
    return false;
  });

  $("#btn_save_aper_").click(function () {
    var _data_aper_c = $("#save_caj_r").serialize();

    var _data_aper_c = {
      btn_save_aper_: true,
      monto_ape_: $("#monto_ape_").val(),
      usu_reg_aper_: $("#usu_reg_aper_").val(),
      id_usu_caja_: $("#id_usu_caja_").val(),

      dife_c: $("#dife_c").val(),
      id_caja_aperturada: $("#id_caja_aperturada").val(),
    };
    $.ajax({
      type: "POST",
      url: "../Controller/Add_Apertura_Caja.php",
      data: _data_aper_c,
      success: function (r) {
        if (r == 1) {
          alert("Monto añadido correctamente.");
          //event.returnValue = false;

          //window.location.href = "AperturaCaja.php";
          window.location.reload(true);
        } else {
          alert(
            "Error al añadir, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });
    return false;
  });

  $("#btn_updt_adi").click(function () {
    var _data_aper_adicional = {
      btn_updt_adi: true,
      id_usu_caja_ad: $("#id_usu_caja_ad").val(),
      usu_reg_aper_ad: $("#usu_reg_aper_ad").val(),
      monto_ape_updt_: $("#monto_ape_updt_").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Apertura_Caja.php",
      data: _data_aper_adicional,
      success: function (r) {
        if (r == 1) {
          alert("Monto añadido correctamente.");
          event.returnValue = false;

          window.location.href = "AperturaCaja.php";
        } else {
          alert(
            "Error al añadir, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btn_updt_aper").click(function () {
    var _data_aper_c_u = {
      btn_updt_aper: true,
      apert_id: $("#apert_id").val(),
      _id_usu_caja_: $("#_id_usu_caja_").val(),
      monto_updt_: $("#monto_updt_").val(),
    };

    $('#btn_updt_aper').prop('disabled', true);

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Apertura_Caja.php",
      data: _data_aper_c_u,
      success: function (r) {
        $('#btn_updt_aper').prop('disabled', false);

        if (r.includes("filas correctamente")) {
          alert("Monto actualizado correctamente.");
          console.log(_data_aper_c_u);
          event.returnValue = false;

          window.location.href = "AperturaCaja.php";
        } else {
          console.log(r);
          alert(
            "Error al actualizar. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btnAsign_add").click(function () {
    var _data_asign_save = $("#save_asign").serialize();

    var _data_asign_save = {
      btnAsign_add: true,
      cod_asign_: $("#cod_asign_").val(),
      nom_asign_: $("#nom_asign_").val().toUpperCase(),
      ape_asign_: $("#ape_asign_").val().toUpperCase(),
      tipo_g_id_: $("#tipo_g_id_").val(),
      // autorizado_: $("#autorizado_").is(":checked"),
    };
    $.ajax({
      type: "POST",
      url: "../Controller/Add_Asignados.php",
      data: _data_asign_save,
      success: function (r) {
        if (r == 1) {
          alert("Asignado creado correctamente.");
          //event.returnValue = false;
          //window.location.href = "GestionAsignados.php";
          window.location.reload(true);
        } else {
          console.log(_data_asign_save);
          alert(
            "Error al crear, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });
    return false;
  });

  $("#btn_save_gasto").click(function () {
    var _data_tipo_gasto_save = $("#save_tipo_gasto").serialize();

    var _data_tipo_gasto_save = {
      btn_save_gasto: true,
      desc_gasto: $("#desc_gasto").val(),
    };
    $.ajax({
      type: "POST",
      url: "../Controller/Add_Tipo_Gastos.php",
      data: _data_tipo_gasto_save,
      success: function (r) {
        if (r == 1) {
          alert("Tipo de Gasto creado correctamente.");
          event.returnValue = false;

          window.location.href = "GestionGastos.php";
        } else {
          alert(
            "Error al crear el tipo, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });
    return false;
  });

  $("#btn_cierre_u").click(function () {
    var _data_cierre = $("#updt_caja_cierre").serialize();
    var _data_cierre_c_u = {
      btn_cierre_u: true,
      monto_real: $("#monto_real").val(),
      monto_cierre: $("#monto_cierre").val(),
      id_apert_c: $("#id_apert_c").val(),
      id_usu: $("#id_usu").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Apertura_Caja.php",
      data: _data_cierre_c_u,
      success: function (r) {
        if (r == 1) {
          alert("Cerrado correctamente.");
          //event.returnValue = false;

          //window.location.href = "Caja-Diaria.php";
          window.location.reload(true);
        } else {
          alert(
            "Error al cerrar caja. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btn_cierre_caja_diferencia").click(function () {
    var _data_cierre_diferencia = {
      btn_cierre_caja_diferencia: true,
      diferenc_m: $("#diferenc_m").val(),
      id_apert_: $("#id_apert_diferencia").val(),
      id_usu: $("#id_usu_diferencia").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Apertura_Caja.php",
      data: _data_cierre_diferencia,
      success: function (r) {
        if (r == 1) {
          alert("Cerrado correctamente.");
          event.returnValue = false;

          window.location.href = "CierreCajaFinal.php";
        } else {
          alert(
            "Error al cerrar caja. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btn_cierre_caja_adicional").click(function () {
    var _data_cierre_adicional = {
      btn_cierre_caja_adicional: true,
      adicional_m: $("#adicional_m").val(),
      id_apert_: $("#id_apert_adicional").val(),
      id_usu: $("#id_usu_adicional").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Apertura_Caja.php",
      data: _data_cierre_adicional,
      success: function (r) {
        if (r == 1) {
          alert("Cerrado correctamente.");
          //event.returnValue = false;

          //window.location.href = "CierreCajaFinal.php";
          window.location.reload(true);
        } else {
          alert(
            "Error al cerrar caja. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btnAsign_updt").click(function () {
    var _data_asign_updt = $("#update_asign").serialize();

    var _data_asign_updt = {
      btnAsign_updt: true,
      id_asign: $("#id_asign").val(),
      doc_asign: $("#doc_asign").val(),
      nom_asign: $("#nom_asign").val(),
      ape_asign: $("#ape_asign").val(),
      cat_asign: $("#cate_usu").val(),
      sta_asign: $("#status_user").is(":checked"),
    };
    $.ajax({
      type: "POST",
      url: "../Controller/Add_Asignados.php",
      data: _data_asign_updt,
      success: function (r) {
        if (r == 1) {
          alert("Se actualizo correctamente.");
          event.returnValue = false;
          window.location.href = "GestionAsignados.php";
        } else if (r == 11) {
          alert("Se actualizo correctamente.");

          window.location.href = "GestionAsignados.php";
          window.location.reload(true);
        } else {
          console.log(r);
          alert(
            "Error al actualizar, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });
    return false;
  });

  $("#btnUsers_updt").click(function () {
    var _data_users_updt = {
      btnUsers_updt: true,
      id_users: $("#id_users").val(),
      doc_users: $("#doc_users").val(),
      nom_users: $("#nom_users").val(),
      ape_users: $("#ape_users").val(),
      cat_users: $("#cate_usu").val(),
      sta_users: $("#status_user").is(":checked"),
      ema_users: $("#mail_users").val()
    };
    $.ajax({
      type: "POST",
      url: "../Controller/Add_Users.php",
      data: _data_users_updt,
      success: function (r) {
        if (r == 1) {
          alert("Se actualizo correctamente.");
          //event.returnValue = false;
          // window.location.href = "GestionAsignados.php";
          window.location.reload(true);
        } else if (r == 11) {
          alert("Se actualizo correctamente.");

          // window.location.href = "GestionAsignados.php";
          window.location.reload(true);
        } else {
          console.log(r);
          alert(
            "Error al actualizar, Verifique que los campos esten correctamente completos."
          );
        }
      },
    });
    return false;
  });

  $("#btnGasto_updt").click(function () {
    var _data_gasto_updt = $("#update_gasto").serialize();

    var _data_gasto_updt = {
      btnGasto_updt: true,
      razon_: $("#razon_").val(),
      id_tipo: $("#id_tipo").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Tipo_Gastos.php",
      data: _data_gasto_updt,
      success: function (r) {
        if (r == 1) {
          alert("Tipo de Gasto Actualizado correctamente.");
          event.returnValue = false;

          window.location.href = "GestionGastos.php";
        } else {
          alert(
            "Error al actualizar Tipo de Gasto. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btn_part_updt").click(function () {
    // var _data_ctg_updt = $("#update_usuario").serialize();

    var _data_updt = {
      btn_part_updt: true,
      id_partida: $("#id_partida").val(),
      desc_partida: $("#desc_partida").val().toUpperCase(),
      status_part: $("#status_part").is(":checked"),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Partida.php",
      data: _data_updt,
      success: function (r) {
        if (r == 1) {
          alert("Se actualizo correctamente.");
          // event.returnValue = false;

          window.location.href = "GestionPartidas.php";
        } else if (r == 11) {
          alert("Se actualizo correctamente.");

          window.location.href = "GestionPartidas.php";
          window.location.reload(true);
        } else {
          alert(
            "Error al actualizar Partida. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btn_sub_part_updt").click(function () {
    // var _data_ctg_updt = $("#update_usuario").serialize();

    var _data_updt = {
      btn_sub_part_updt: true,
      id_sub_partida: $("#id_sub_partida").val(),
      desc_sub_partida: $("#desc_sub_partida").val().toUpperCase(),
      status_sub_part: $("#status_sub_part").is(":checked"),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Partida.php",
      data: _data_updt,
      success: function (r) {
        if (r == 1) {
          alert("Se actualizo correctamente.");
          // event.returnValue = false;

          window.location.href = "GestionPartidas.php";
        } else if (r == 11) {
          alert("Se actualizo correctamente.");

          window.location.href = "GestionPartidas.php";
          window.location.reload(true);
        } else {
          alert(
            "Error al actualizar Partida. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btnGasto_delete").click(function () {
    var _data_gasto_dlt = $("#delete_gasto").serialize();

    var _data_gasto_dlt = {
      btnGasto_delete: true,
      id_tipo_: $("#id_tipo_").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Tipo_Gastos.php",
      data: _data_gasto_dlt,
      success: function (r) {
        if (r == 1) {
          alert("Tipo de Gasto Eliminado correctamente.");
          event.returnValue = false;

          window.location.href = "GestionGastos.php";
        } else {
          alert(
            "Error al eliminar Tipo de Gasto. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btnAsign_delete").click(function () {
    var _data_asign_dlt = $("#delete_asign").serialize();

    var _data_asign_dlt = {
      btnAsign_delete: true,
      id_asign_dlt: $("#id_asign_dlt").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Asignados.php",
      data: _data_asign_dlt,
      success: function (r) {
        if (r == 1) {
          alert("Asignado Eliminado correctamente.");
          //event.returnValue = false;

          //window.location.href = "GestionAsignados.php";
          window.location.reload(true);
        } else {
          console.log(r);
          alert(
            "Error al eliminar asignado. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btnCentro_updt").click(function () {
    var _data_centro_updt = $("#update_gasto").serialize();

    var _data_centro_updt = {
      btnCentro_updt: true,
      identif_cent: $("#identif_cent").val(),
      desc_cent: $("#desc_cent").val(),
      id_cent: $("#id_cent").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Centro_Costos.php",
      data: _data_centro_updt,
      success: function (r) {
        if (r == 1) {
          alert("Centro de Costo Actualizado correctamente.");
          event.returnValue = false;

          window.location.href = "GestionCentroCostos.php";
        } else {
          alert(
            "Error al actualizar Centro de Costo. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btnCentro_delete").click(function () {
    var _data_centro_dlt = $("#delete_centro").serialize();

    var _data_centro_dlt = {
      btnCentro_delete: true,
      id_center_: $("#id_center_").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Centro_Costos.php",
      data: _data_centro_dlt,
      success: function (r) {
        if (r == 1) {
          alert("Centro de Costo eliminado correctamente.");
          event.returnValue = false;

          window.location.href = "GestionCentroCostos.php";
        } else {
          alert(
            "Error al eliminar el Centro de Costo Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btnUsers_delete").click(function () {
    var _data_users_dlt = {
      btnUsers_delete: true,
      id_user_dlt: $("#id_user_dlt").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Users.php",
      data: _data_users_dlt,
      success: function (r) {
        if (r == 1) {
          alert("Usuario eliminado correctamente.");
          //event.returnValue = false;

          //window.location.href = "GestionTrabajadores.php";
          window.location.reload(true);
        } else {
          console.log(r);
          alert(
            "Error al eliminar trabajador. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btn_p_delete").click(function () {
    // var _data_cate_dlt = $("#delete_cate").serialize();

    var _data_dlt = {
      btn_p_delete: true,
      id_part_dlt: $("#id_part_dlt").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Partida.php",
      data: _data_dlt,
      success: function (r) {
        console.log(r);
        if (r == 1) {
          alert("Partida eliminada correctamente.");
          // event.returnValue = false;

          window.location.href = "GestionPartidas.php";
        } else {
          console.log(r);
          alert(
            "Error al eliminar partida. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btn_sp_delete").click(function () {
    // var _data_cate_dlt = $("#delete_cate").serialize();

    var _data_dlt = {
      btn_sp_delete: true,
      id_sub_part_dlt: $("#id_sub_part_dlt").val(),
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Partida.php",
      data: _data_dlt,
      success: function (r) {
        console.log(r);
        if (r == 1) {
          alert("Partida eliminada correctamente.");
          // event.returnValue = false;

          window.location.href = "GestionPartidas.php";
        } else {
          console.log(r);
          alert(
            "Error al eliminar partida. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

  $("#btn_add_ingr").click(function () {
    // var _data_cate_dlt = $("#delete_cate").serialize();

    var _data_dlt = {
      btn_add_ingr: true,
      id: $('#id_caja_admin').val(),
      partida: $('#tipo_partida').val(),
      sub_partida: $('#tipo_subpartida').val(),
      sub_subpartida: $('#sub_subpartida').val(),
      especif: $('#especif').val(),
      cod_apert_c_: $('#cod_apert_c_').val(),
      monto: $('#monto_admin').val(),
      t_moneda: $('#t_moneda').val(),
      obs: $('#obs_admin').val(),
      centro_c_: $('#centro_c_').val()
    };

    $.ajax({
      type: "POST",
      url: "../Controller/Add_Ingreso.php",
      data: _data_dlt,
      success: function (r) {
        console.log(r);
        if (r == 1) {
          alert("Ingreso creado correctamente.");
          //   // event.returnValue = false;

          //   window.location.href = "GestionPartidas.php";
          window.location.reload(true);
        } else {
          //   console.log(r);
          alert(
            "Error al crear el ingreso. Verifique que los campos estén correctamente completos."
          );
        }
      },
    });

    return false;
  });

});
