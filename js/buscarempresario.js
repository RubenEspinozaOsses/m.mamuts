

function buscar(){

    var textfield = document.getElementById('textfield');
    
    

    var value = textfield.value;

    console.log(value)

    if (value == ''){
        mostrarTodos();
    }

    var empresarios = document.getElementById('empresarios').getElementsByTagName('li');


    console.log(!empresarios[0].innerText.includes(value))

    for (var i = 0; i < empresarios.length; i++) {
        if (!empresarios[i].innerText.includes(value)){
            empresarios[i].style.display = 'none'
        }
    }
}

function mostrarTodos(){
    var empresarios = document.getElementById('empresarios').getElementsByTagName('li');
    for (var i = 0; i < empresarios.length; i++) {
        empresarios[i].style.display = 'inline'
    }
}