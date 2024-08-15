var init = () => {
    $("#frm_departamentos").on("submit", (e) => {
      guardaryeditar(e);
    });
  };
  
  $().ready(() => {
    cargaTabla();
  });
  
  var cargaTabla = () => {
    $.get("../controllers/departamentos.controller.php?op=todoss", (Departamentos) => {
      var html = "";
      console.log(Departamentos);
      Departamentos = JSON.parse(Departamentos);
      console.log(Departamentos);
      $.each(Departamentos, (index, Departamentos) => {
        html += `<tr>
                  <td>${index + 1}</td>
                  <td>${Departamentos.Nombre_departamentos}</td>
                  <td>${Departamentos.Ubicacion}</td>
                  <td>${Departamentos.Jefe_departamento}</td>
                  <td>${Departamentos.Extencion}</td>
                  <td><button class="btn btn-primary">Editar</button> <button class="btn btn-danger">Eliminar</button></td>
                  </tr>
                  `;
      });
      $("#cuerpodepartamentos").html(html);
    });
  };
  
  var guardaryeditar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#frm_departamentos")[0]);
    $.ajax({
      url: "../controllers/departamentos.controller.php?op=insertar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        console.log(datos);
        $("#frm_departamentos")[0].reset();
        $("#modal").modal("hide");
        cargaTabla();
      },
    });
  };
  
  init();