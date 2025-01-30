$(document).ready(function () {
  let $tipo_partida = document.querySelector("#tipo_partida");
  let $tipo_subpartida = document.querySelector("#tipo_subpartida");
  let $centro_costos = document.querySelector("#centro_c_");
  let $beneficiario = document.querySelector("#beneficiario");

  function loadTipoPartida() {
    $.ajax({
      type: "GET",
      url: "../Controller/select.php",
      success: function (response) {
        const tipo_partida = JSON.parse(response);
        // console.log(tipo_partida);
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

  function uploadSubTipoPartida(sendData) {
    $.ajax({
      type: "POST",
      url: "../Controller/select.php",
      data: sendData,
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

  function uploadCentroCostos(sendData) {
    $.ajax({
      type: "POST",
      url: "../Controller/select.php",
      data: sendData,
      charset: "utf-8",
      success: function (response) {
        const centroCosto = JSON.parse(response);
        // console.log(centroCosto);
        let template =
          '<option selected disabled value="-1">CENTRO DE COSTOS</option>';

        centroCosto.forEach((centroCostos) => {
          template += `<option value="${centroCostos.id_centro}">${centroCostos.desc_centro}</option>`;
        });

        $centro_costos.innerHTML = template;

        centroCosto.forEach((centroCostos) => {
          //console.log($beneficiario);
          //console.log(centroCostos.benef);
          if (centroCostos.benef == 1) {
            $beneficiario.style.display = "flex";
          } else {
            $beneficiario.style.display = "none";
          }
        });
      },
    });
  }

  $tipo_partida.addEventListener("change", function () {
    const codigoTipo = $tipo_partida.value;


    $beneficiario.style.display = "none";



    if ($("#benef") !== null) {
      $("#select_2").val(null).trigger("change");
      $("#select_2").select2("destroy");

      $("#select_2").select2();
    }



    $("#benef").val("-1");

    const sendDatos = {
      cod_tipo: codigoTipo,
    };

    uploadSubTipoPartida(sendDatos);
  });

  $tipo_subpartida.addEventListener("change", function () {
    const codigoSub = $tipo_subpartida.value;

    const sendDatos = {
      cod_subtipo: codigoSub,
    };

    uploadCentroCostos(sendDatos);
  });
});
