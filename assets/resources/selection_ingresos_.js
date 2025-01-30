$(document).ready(function () {
  const $tipo_partida = document.querySelector("#tipo_partida");
  const $tipo_subpartida = document.querySelector("#tipo_subpartida");
  let $sub_subpartida = document.querySelector("#sub_subpartida");
  let $show_subsubpartida = document.querySelector("#show-subsubpartida");
  let $show_especif = document.querySelector("#show-especif");


  function loadTipoPartida() {
    $.ajax({
      type: "GET",
      url: "../Controller/select_i_.php",
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

  function uploadSubSubPartida(sendDatos) {
    $.ajax({
      type: "POST",
      url: "../Controller/select_i_.php",
      data: sendDatos,
      charset: "utf-8",
      success: function (response) {
        const subSubPartida = JSON.parse(response);
        // console.log(subSubPartida);
        let template =
          '<option selected disabled value="-1">SUB SUBPARTIDAS</option>';

        subSubPartida.forEach((subSubPartida) => {
          template += `<option value="${subSubPartida.id_sub_sub}">${subSubPartida.desc_sub_sub}</option>`;
        });

        $sub_subpartida.innerHTML = template;

        // subSubPartida.forEach(element => {
        // console.log(element);


        // if (element.id_sub == 128) {
        //   $show_subsubpartida.style.display = "flex";
        // } else {
        //   $show_subsubpartida.style.display = "none";
        // }
        // });

      },
    })
  }


  $tipo_subpartida.addEventListener("change", function () {
    const codigoSub = $tipo_subpartida.value;

    const sendDatos = {
      cod_subtipo: codigoSub,
    };

    uploadSubSubPartida(sendDatos);

    const cod_subpart = event.target.value;
    // console.log(cod_subpart);

    if (cod_subpart == 128) {
      $show_subsubpartida.style.display = "flex";
    } else {
      $show_subsubpartida.style.display = "none";
    }

    if (cod_subpart == 134 || cod_subpart == 137) {
      $show_especif.style.display = "flex";
    } else {
      $show_especif.style.display = "none";
    }

    // 134 137

  });
});