/*========= SIDEBAR =========*/

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


/*========= WRITERS =========*/


function edit_data(id){
    // Trocando o botão editar para salvar
    document.getElementById('edit_btn' + id).style.display = "none";
    document.getElementById('save_btn' + id).style.display = "inline-block";
    document.getElementById('delete_btn' +id).style.display = "inline-block";
    document.getElementById('close' +id).style.display = "inline-block";
    document.getElementById('th_text').style.display = "inline-block"; 
    
    // var from writers.blade
    let first = window.firstItem
    // let last = window.lastItem
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
        writer_name: writerNameValue,
        writer_update: null
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


/*========= BOOKS =========*/


// Add a book

function addBook(){
    // Book title
    document.getElementById('book_add_title').style.display = "none";
    document.getElementById('book_title').style.display = "block";

    // Genres
    document.getElementById('genre').style.display = "none";
    document.getElementById('genre_input').style.display = "block";

    // Writer
    document.getElementById('writer').style.display = "none";
    document.getElementById('writer_select').style.display = "block";

    // Save Btn
    document.getElementById('book_cover').style.flexDirection = "column";
    document.getElementById('save_btn').style.display = "";
    document.getElementById('cancel_btn').style.display = "";
    
}
// Cancel add a book
function cancelAddBook(){
    // Book title
    document.getElementById('book_add_title').style.display = "block";
    document.getElementById('book_title').style.display = "none";

    // Genres
    document.getElementById('genre').style.display = "block";
    document.getElementById('genre_input').style.display = "none";

    // Writer
    document.getElementById('writer').style.display = "block";
    document.getElementById('writer_select').style.display = "none";

    // Save Btn
    document.getElementById('save_btn').style.display = "none";
    document.getElementById('cancel_btn').style.display = "none";
    
}

// show inputs to update
function updateBook(){
    // changing buttons
    document.getElementById('updateBookBtn').style.display = "none";
    document.getElementById('closeBookBtn').style.display = "";
    document.getElementById('save_book').style.display = "";
    document.getElementById('delete_book').style.display = "";
    document.getElementById('rentBtn').style.display = "none";


    // change title to input
    var bookTitle = document.getElementById('book_title');
    bookValue = bookTitle.innerHTML;
    bookTitle.innerHTML = "<input type='text' name='book_name' class='form-control' id='book_text'value='" + bookValue + "' >";

    // change writer to select
    var writerName = document.getElementById("writer_name");
    writerName.style.display = "none";

    var writerSelect = document.getElementById("writer_select_update");
    writerSelect.style.display = "";

    // change genre to input
    var genres = document.getElementById('genres');
    genreValue = genres.innerHTML;
    genres.innerHTML = "<input type='text' name='genre' class='form-control' id='genre_text'value='" + genreValue + "' >";

    // change synopsis textarea
    document.getElementById('synopsis_text').style.display = "none";
    document.getElementById('synopsis').style.display = "";
    
}

// close/cancel update
function closeBook(){
    var writerSelect = document.getElementById("writer_select_update");
    writerSelect.style.display = "";

    var selectedOption = writerSelect.options[writerSelect.selectedIndex];
    var selectedText = selectedOption.textContent;
    var writerName = document.getElementById("writer_name");
    writerName.innerHTML = selectedText;

    // changing buttons
    document.getElementById('updateBookBtn').style.display = "";
    document.getElementById('closeBookBtn').style.display = "none";
    document.getElementById('save_book').style.display = "none";
    document.getElementById('delete_book').style.display = "none";
    document.getElementById('rentBtn').style.display = "";


    // change input to genres 
    var bookTitle = document.getElementById('book_title');
    bookTitle.innerHTML = bookValue;

    // change select to writer
    document.getElementById("writer_name").style.display = "";
    document.getElementById("writer_select_update").style.display = "none";

    // change input to title 
    var genres = document.getElementById('genres');
    genres.innerHTML = genreValue;

    // back to normal synopsis
    document.getElementById('synopsis_text').style.display = "";
    document.getElementById('synopsis').style.display = "none";

}


// update Book
async function updateBookData(id){
    // get the input values
    var bookName = document.getElementById("book_text").value;
    var genre = document.getElementById("genre_text").value;
    var writerId = document.getElementById("writer_select_update").value;
    var synopsisValue = document.getElementById("synopsis").value;
    
    // Change to new datas
    document.getElementById("book_title").innerHTML = bookName;
    document.getElementById("bookH1").innerHTML = bookName;
    document.getElementById("genres").innerHTML = genre;
    document.getElementById("synopsis_text").innerHTML = synopsisValue;

    // change writer to selected option
    document.getElementById("writer_name").style.display = "";

    var writerSelect = document.getElementById("writer_select_update");
    writerSelect.style.display = "none";

    var selectedOption = writerSelect.options[writerSelect.selectedIndex];
    var selectedText = selectedOption.textContent;
    var writerName = document.getElementById("writer_name");
    writerName.innerHTML = selectedText;
    
    // document.getElementById("writer_name").innerHTML = writerId;

    var updateForm = {
        id: id,
        book_name: bookName,
        genre: genre,
        writer_id: writerId,
        synopsis: synopsisValue,
        book_update: null
    };
    console.log(updateForm);

    await fetch("/books", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'url': '/writers',
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
        },
        body: JSON.stringify(updateForm)
    })
    .then(response => response.json())
    .then(result => console.log(result))
    .catch(error => console.error(error));

    const result = JSON.stringify(updateForm);
    console.log(result);

    //backing to normal inputs and btns
    document.getElementById('updateBookBtn').style.display = "";
    document.getElementById('closeBookBtn').style.display = "none";
    document.getElementById('save_book').style.display = "none";
    document.getElementById('delete_book').style.display = "none";
    document.getElementById('rentBtn').style.display = "";
    // back to normal synopsis
    document.getElementById('synopsis_text').style.display = "";
    document.getElementById('synopsis').style.display = "none";

    
}


/*========= DARK/LIGHT MODE =========*/


// Dark Mode
function darkMode(){
    document.getElementById("moonBtn").style.display = "none";
    document.getElementById("sunBtn").style.display = "";
    
    localStorage.setItem("none", "displayNone");
    
    document.body.style.backgroundColor = "#5C5C5C"
    // document.querySelector(".dark").style.color = "white";
    
    localStorage.removeItem('light');
    localStorage.setItem('dark', 'black');

}

let moonBtn = localStorage.getItem('dark');
if (moonBtn) {
    document.getElementById("moonBtn").style.display = "none";
    document.getElementById("sunBtn").style.display = "";
    document.body.style.backgroundColor = "#5C5C5C";
    // document.querySelector(".dark").style.color = "white";


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


/*========= SUCCESS MESSAGE =========*/

// Remove a mensagem após 5 segundos
setTimeout(function() {
    $('#success-message').remove();
}, 5000);



/*========= IMAGE DISPLAY  =========*/

const EditFile = document.querySelector("#EditFile");
var uploadedImage = "";

EditFile.addEventListener("change", function(){
    const editReader = new FileReader();
    console.log(editReader);
    editReader.addEventListener("load", () => {
        uploadedImage = editReader.result;
        document.querySelector("#bookCover").style.backgroundImage = `url(${uploadedImage})`;
    });
    editReader.readAsDataURL(this.files[0]);
})

