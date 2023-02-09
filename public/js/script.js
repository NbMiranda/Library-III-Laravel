
function edit_data(id){
    // Trocando o botão editar para salvar
    document.getElementById('edit_btn' + id).style.display = "none";
    document.getElementById('save_btn' + id).style.display = "block";
    // btn.innerHTML = "<button type='button' id='save_btn{{$id}}' onclick='save_data"+id+"'>Salvar</button>"


    var writerName = document.getElementById('writerName'+id);

    writer = writerName.innerHTML;

    console.log(writer);

    writerName.innerHTML = "<input type='text' id='name_text" + id + "'value='" + writer + "'>";

    

}

async function save_data(id){
    var writerNameValue = document.getElementById("name_text" + id).value;
    
    document.getElementById("writerName" + id).innerHTML = writerNameValue;

    var dataForm = {
        id: id,
        writer_name: writerNameValue
    };
    console.log(dataForm);

    await fetch("/writers", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'url': '/writers',
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
        },
        body: JSON.stringify(dataForm)
    })
    .then(response => response.json())
    .then(result => console.log(result))
    .catch(error => console.error(error));

    const result = JSON.stringify(dataForm);
    console.log(result);

    document.getElementById('save_btn' + id).style.display = "none";
    document.getElementById('edit_btn' + id).style.display = "inline";
}