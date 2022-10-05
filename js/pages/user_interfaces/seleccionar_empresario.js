
function buscar(){

    let textfield = document.getElementById('textfield');
    
    

    let value = textfield.value.toLowerCase();


    

    let cards = document.getElementById('empresarios').querySelectorAll('.card')

    for (const card of cards) {

        if (card.innerText.toLowerCase().includes(value)){
            card.parentNode.closest('.row').classList.remove('is-hidden')
        }else {
            card.parentNode.closest('.row').classList.add('is-hidden')
        }
    }
}
