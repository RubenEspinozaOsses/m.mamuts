
var empresarios = ['Ruben', 'Patricio', 'Andres', 'Juan', 'Oscar', 'Matias', 'Miguel', 'Ana', 'Luis', 'Amaria', 'Rossana', 'Maggiolli', 'Lilian', 'Janet']

function load(){

    var row = document.getElementById('empresarios')

    //console.log(elemento)

    /*for (var i = 0; i < empresarios.length; i++) {
        var li = document.createElement('li')
        li.className = 'list-group-item'
        lidata = document.createTextNode(empresarios[i])
        li.appendChild(lidata)
        elemento.appendChild(li);
    }*/

    for (var i = 0; i < empresarios.length; i++) {

        var col_sm = document.createElement('div')
        col_sm.className = "col-sm-6"

        var card = document.createElement('div')
        card.className = "card"


        var card_body = document.createElement('div')
        card_body.className = 'card-body'

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
        pdata = document.createTextNode('Rut Empresa  20106191-1');
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


        //agregando todo al card-body
        card_body.appendChild(h5)
        card_body.appendChild(h6)
        card_body.appendChild(p)
        card_body.appendChild(a1)
        card_body.appendChild(a2)


        //agregando card-body al card
        card.appendChild(card_body)

        
        //agregando el card al col-sm-6
        col_sm.appendChild(card)


        //agregando el card-sm-6 al row
        row.appendChild(col_sm)

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
        empresarios[i].style.display = 'block'
    }
}