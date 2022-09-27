
function buscar(){

    let textfield = document.getElementById('textfield');
    
    

    let value = textfield.value;


    

    let cards = document.getElementById('empresarios').querySelectorAll('.card')

    for (const card of cards) {

        if (card.innerText.includes(value)){
            card.parentNode.closest('.row').classList.remove('is-hidden')
        }else {
            card.parentNode.closest('.row').classList.add('is-hidden')
        }
    }
}
