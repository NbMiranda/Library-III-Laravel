function edit_data(id){
    // Trocando o botão editar para salvar
    document.getElementById('edit_btn' + id).style.display = "none";
    document.getElementById('save_btn' + id).style.display = "inline-block";
    document.getElementById('delete_btn' +id).style.display = "inline-block";
    document.getElementById('close' +id).style.display = "inline-block";
    document.getElementById('th_text').style.display = "inline-block"; 
    
    // var from writers.blade
    let first = window.firstItem
    let last = window.lastItem
    let count = window.count;

    // Hide other buttons
    let array = window.arrayId;
    for (let i = 0; i < count; i++) {
        const n = array[first];
        document.getElementById('edit_btn' + n).style.display = "none";
        first++    
    }
    
    var writerName = document.getElementById('writerName'+id);

    writer = writerName.innerHTML;

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
     
    // var from writers.blade
    let first = window.firstItem
    let count = window.count;

    // Hide other buttons
    let array = window.arrayId;
    for (let i = 0; i < count; i++) {
        const n = array[first];
        document.getElementById('edit_btn' + n).style.display = "";
        first++    
    }
    
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
    document.getElementById('edit_btn' + id).style.display = "inline-block";
    document.getElementById('th_text').style.display = "none"; 

    // var from writers.blade
    let first = window.firstItem
    let count = window.count;
    
    // Hide other buttons
    let array = window.arrayId;
    for (let i = 0; i < count; i++) {
        const n = array[first];
        document.getElementById('edit_btn' + n).style.display = "";
        first++    
    }
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
    document.getElementById("moonBtn").style.display = "none";
    document.getElementById("sunBtn").style.display = "";
    
    localStorage.setItem("none", "displayNone");
    
    document.body.style.backgroundColor = "#141414"
    
    localStorage.removeItem('light');
    localStorage.setItem('dark', 'black');

}

let moonBtn = localStorage.getItem('dark');
if (moonBtn) {
    document.getElementById("moonBtn").style.display = "none";
    document.getElementById("sunBtn").style.display = "";
    document.body.style.backgroundColor = "#141414";

}
// light mode
function lightMode(){
    document.getElementById("moonBtn").style.display = "";
    document.getElementById("sunBtn").style.display = "none";
    document.body.style.backgroundColor = "#f5f5f5";

    localStorage.removeItem('dark');
    localStorage.setItem('light', 'white');

}

let light = localStorage.getItem('light');
if (light) {
    document.body.style.backgroundColor = "#F5F5F5";
    
}