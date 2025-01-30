$(document).ready(function () {
  const $tipo_partida = document.querySelector("#tipo_partida");
  let $tipo_subpartida = document.querySelector("#tipo_subpartida");
  let $centro_costos = document.querySelector("#centro_c_");
  let $show_subsubpartida = document.querySelector("#show-subsubpartida");
  let $show_especif = document.querySelector("#show-especif");


  function loadTipoPartida() {
    $.ajax({
      type: "GET",
      url: "../Controller/select_i.php",
      success: function (response) {
        const tipo_partida = JSON.parse(response);
        let template =
          '<option disabled selected="selected" value ="-1">PARTIDAS</option>';

        tipo_partida.forEach((tipoPartida) => {
          template += `<option value="${tipoPartida.id}">${tipoPartida.desc}</option>`;
        });

        $tipo_partida.innerHTML = template;
      },
    });
  }
  loadTipoPartida();

  function uploadSubTipoPartida(sendDatos) {
    $.ajax({
      type: "POST",
      url: "../Controller/select_i.php",
      data: sendDatos,
      charset: "utf-8",
      success: function (response) {
        const subtipos = JSON.parse(response);
        // console.log(subtipos);
        let template =
          '<option selected disabled value="-1">SUB PARTIDAS</option>';

        subtipos.forEach((SubTipoPartida) => {
          template += `<option value="${SubTipoPartida.id_sub}">${SubTipoPartida.desc_sub}</option>`;
        });
        $tipo_subpartida.innerHTML = template;

      },
    });
  }


  function uploadCentroCostos(sendDatos) {
    $.ajax({
      type: "POST",
      url: "../Controller/select_i.php",
      data: sendDatos,
      charset: "utf-8",
      success: function (response_) {
        const centroCosto = JSON.parse(response_);
        console.log(centroCosto);
        let template =
          '<option selected disabled value="-1">CENTRO DE COSTOS</option>';

        centroCosto.forEach((centroCostos) => {
          template += `<option value="${centroCostos.id_centro}">${centroCostos.desc_centro}</option>`;
        });

        $centro_costos.innerHTML = template;

      },
    });
  }


  $tipo_partida.addEventListener("change", function () {

    const codigoTipo = $tipo_partida.value;

    const sendDatos = {
      cod_tipo: codigoTipo,
    };

    uploadSubTipoPartida(sendDatos);

    $show_subsubpartida.style.display = "none";
    $show_especif.style.display = "none";
  });

  $tipo_subpartida.addEventListener("change", function () {
    const codigoPar = $tipo_partida.value;
    const codigoSub = $tipo_subpartida.value;

    const sendDatos = {
      cod_tipo: codigoPar,
      cod_subtipo: codigoSub,
    };

    uploadCentroCostos(sendDatos);
    // uploadCentroCostos(codigoPar, codigoSub);
  });
});