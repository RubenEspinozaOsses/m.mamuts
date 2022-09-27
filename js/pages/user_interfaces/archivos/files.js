function buscar(){

    let textfield = document.getElementById('textfield');
    
    

    let value = textfield.value;


    

    let rows = document.getElementById('file-container').querySelectorAll('.row')

    for (const row of rows) {

        if (row.innerText.includes(value)){
            row.classList.remove('is-hidden')
        }else {
            row.classList.add('is-hidden')
        }
    }
}
