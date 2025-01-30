$(document).ready(function () {
  let $_tipo_partida = document.querySelector("#_part");
  let $_tipo_subpartida = document.querySelector("#_subpart");

  function loadTipoPartida() {
    $.ajax({
      type: "GET",
      url: "../Controller/select_.php",
      success: function (response) {
        const tipo_partida = JSON.parse(response);
        let template =
          '<option disabled selected="selected" value ="-1">PARTIDAS</option>';

        tipo_partida.forEach((tipoPartida) => {
          template += `<option value="${tipoPartida.id}">${tipoPartida.desc}</option>`;
        });

        $_tipo_partida.innerHTML = template;
      },
    });
  }
  loadTipoPartida();

  function uploadSubTipoPartida(sendData) {
    if ($_tipo_partida.value == -1 || $_tipo_partida.value == null) {
      $_tipo_subpartida
        .html(
          "<option selected disabled> Primero debes seleccionar el tipo de inmueble </option>"
        )
        .prop("disabled", true);
      $_tipo_subpartida.disabled = true;
      return;
    }
    $.ajax({
      type: "POST",
      url: "../Controller/select_.php",
      data: sendData,
      charset: "utf-8",
      success: function (response) {
        const subtipos = JSON.parse(response);
        let template = "";

        subtipos.forEach((SubTipoPartida) => {
          template += `<option value="${SubTipoPartida.id_sub}">${SubTipoPartida.desc_sub}</option>`;
        });
        $_tipo_subpartida.innerHTML = template;
      },
    });
  }

  $_tipo_partida.addEventListener("change", function () {
    const codigoTipo = $_tipo_partida.value;

    const sendDatos = {
      cod_tipo: codigoTipo,
    };

    uploadSubTipoPartida(sendDatos);
  });
});
