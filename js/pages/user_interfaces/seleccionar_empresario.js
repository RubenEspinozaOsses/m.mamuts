
var empresarios = ['Ruben', 'Patricio', 'Andres', 'Juan', 'Oscar', 'Matias', 'Miguel', 'Ana', 'Luis', 'Amaria', 'Rossana', 'Maggiolli', 'Lilian', 'Janet']

function load(){

    var elemento = document.getElementById('empresarios')

    console.log(elemento)

    /*for (var i = 0; i < empresarios.length; i++) {
        var li = document.createElement('li')
        li.className = 'list-group-item'
        lidata = document.createTextNode(empresarios[i])
        li.appendChild(lidata)
        elemento.appendChild(li);
    }*/

    for (var i = 0; i < empresarios.length; i++) {
        var div = document.createElement('div')
        div.className = 'card-body'

        var h5 = document.createElement('h5')
        h5.className = 'card-title'
        h5data = document.createTextNode(empresarios[i]);
        h5.appendChild(h5data)

        var h6 = document.createElement('h6')
        h6.className = 'card-subtitle mb-2 text-muted'
        h6data = document.createTextNode('Card subtitle');
        h6.appendChild(h6data)

        var p = document.createElement('p')
        p.className = 'card-text'
        pdata = document.createTextNode('Some quick example text to build on the card title and make up the bulk of the card\'s content.');
        p.appendChild(pdata)

        var a1 = document.createElement('a')
        a1.href = '#'
        a1.className = 'card-link'
        a1data = document.createTextNode('Card link');
        a1.appendChild(a1data)

        var a2 = document.createElement('a')
        a2.href = '#'
        a2.className = 'card-link'
        a2data = document.createTextNode('Another link')
        a2.appendChild(a2data)

        div.appendChild(h5)
        div.appendChild(h6)
        div.appendChild(p)
        div.appendChild(a1)
        div.appendChild(a2)

        elemento.appendChild(div)

    }

}

function buscar(){

    var textfield = document.getElementById('textfield');
    
    

    var value = textfield.value;


    if (value == ''){
        mostrarTodos();
    }

    var empresarios = document.getElementById('empresarios').getElementsByTagName('div');


    

    for (var i = 0; i < empresarios.length; i++) {
        if (!empresarios[i].innerText.includes(value)){
            empresarios[i].style.display = 'none'
        }
    }
}

function mostrarTodos(){
    var empresarios = document.getElementById('empresarios').getElementsByTagName('div');
    for (var i = 0; i < empresarios.length; i++) {
        empresarios[i].style.display = 'inline'
    }
}