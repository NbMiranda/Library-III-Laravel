function edit_data(id){
    // Trocando o botão editar para salvar
    document.getElementById('edit_btn' + id).style.display = "none";
    document.getElementById('save_btn' + id).style.display = "";
    document.getElementById('delete_btn' +id).style.display = "";
    document.getElementById('close' +id).style.display = "";
    document.getElementById('th_text').style.display = ""; 
 
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
     document.getElementById('th_text').style.display = "none"; 
     
 
     var writerName = document.getElementById('writerName'+id);
          
     writerName.innerHTML = "<td id='writerName"+ id +"'>"+ writer+"</td>";
     
     document.getElementById('close' +id).style.display = "none";

     document.getElementById('th_text').style.display = "none"; 

    
}

// Create Writer

function create_data(){
    document.getElementById('create_btn').style.display = "none";
    document.getElementById('register_btn').style.display = "inline-block";

    document.getElementById('new_writer').style.display = "none";
    document.getElementById('writer_name').style.display = "inline-block";
    
    document.getElementById('create_data_btn').style.display = "inline-block";

    document.getElementById('th_text').style.display = ""; 


}

// Close Create Writer
function close_create_data(){
    document.getElementById('create_btn').style.display = "inline-block";
    document.getElementById('register_btn').style.display = "none";

    document.getElementById('new_writer').style.display = "inline-block";
    document.getElementById('writer_name').style.display = "none";
    
    document.getElementById('create_data_btn').style.display = "none";

    document.getElementById('th_text').style.display = "none"; 


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
    document.getElementById('th_text').style.display = ""; 


}

// Sidebar
document.addEventListener("DOMContentLoaded", function(event) {
           
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
});

// Dark Mode
function darkMode(){
    document.getElementById('darkBtn').style.display = 'none';
    document.getElementById('lightBtn').style.display = '';

    localStorage.setItem('displayNone', 'none');
    localStorage.setItem('displayInline', '');


    var newColor = "#141414";
    document.body.style.backgroundColor = newColor;
    localStorage.setItem("background-color", newColor);
  }

//   Mudando botão
var displayNone = localStorage.getItem("displayNone");
var displayInline = localStorage.getItem("displayInline");
if (displayNone || displayInline) {
    document.getElementById('darkBtn').style.display = displayNone;
    document.getElementById('lightBtn').style.display = displayInline;
}

//   Mudando cor
  var savedColor = localStorage.getItem("background-color");
  if (savedColor) {
    document.body.style.backgroundColor = savedColor;
  }

// Light Mode
function lightMode(){
    document.getElementById('darkBtn').style.display = '';
    document.getElementById('lightBtn').style.display = 'none';
    var newColor = "#f5f5f5";
    document.body.style.backgroundColor = newColor;
    localStorage.setItem("background-color", newColor);
  }
//Mudando a cor
var savedColor = localStorage.getItem("background-color");
if (savedColor) {
    document.body.style.backgroundColor = savedColor;

}