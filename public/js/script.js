function edit_data(id){
    // Trocando o botão editar para salvar
    document.getElementById('edit_btn' + id).style.display = "none";
    document.getElementById('save_btn' + id).style.display = "";
    document.getElementById('delete_btn' +id).style.display = "";
    document.getElementById('close' +id).style.display = ""; 
    // btn.innerHTML = "<button type='button' id='save_btn{{$id}}' onclick='save_data"+id+"'>Salvar</button>"


    var writerName = document.getElementById('writerName'+id);

    writer = writerName.innerHTML;

    // console.log(writer);

    writerName.innerHTML = "<input type='text' name='writerName"+id+"' class='form-control' id='name_text" + id + "'value='" + writer + "' >";


}

// Close Edit 

function close_btn(id){
    
     document.getElementById('edit_btn' + id).style.display = "inline-block";
     document.getElementById('save_btn' + id).style.display = "none";
     document.getElementById('delete_btn' +id).style.display = "none"; 
     
 
     var writerName = document.getElementById('writerName'+id);
          
     writerName.innerHTML = "<td id='writerName"+ id +"'>"+ writer+"</td>";
     
     document.getElementById('close' +id).style.display = "none";
    
}

// Create Writer

function create_data(){
    document.getElementById('create_btn').style.display = "none";
    document.getElementById('register_btn').style.display = "block";

    document.getElementById('new_writer').style.display = "none";
    document.getElementById('writer_name').style.display = "block";

}

// update writer
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
    document.getElementById('delete_btn' + id).style.display = "none";
    document.getElementById('close' +id).style.display = "none"; 
    document.getElementById('edit_btn' + id).style.display = "";

}

