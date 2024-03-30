document.getElementById("campo").addEventListener("keyup", getCodigos)

function getCodigos() {

    let inputCP = document.getElementById("campo").value
    let lista = document.getElementById("lista")

    if (inputCP.length > 0) {

        let url = "inc/getCodigos.php"
        let formData = new FormData()
        formData.append("campo", inputCP)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
    }
}

function mostrar(cp) {
    lista.style.display = 'none'
    alert("CP: " + cp)
}

$("#nombres").autocomplete({
    source: function (request, response) {
   $.ajax({
       url: "/ajax.php",
       dataType: "json",
       data: {
           q: request.term
       },
       success: function (data) {
           response(data);
       }
   });
},
minLength: 3,
select: function (event, ui) {
   $("#idcliente").val(ui.item.cliente_id);
   $("#nombres").val(ui.item.label);
   $("#tel").val(ui.item.telefono);
   $("#correo").val(ui.item.direccion);
}
})