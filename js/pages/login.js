
function rutValido() {
    const elemento = document.getElementById("rut")
    const campo = elemento.value


    if (campo.lenght > 2) { return false }

    const cuerpo = campo.split('-')[0].split('').reverse().join('')
    const dv = campo.split('-')[1]

    const factores = [2, 4, 5, 6, 7]

    let suma = 0
    let j = 0;
    for (let i = 0; i < cuerpo.lenght; i++){
        if (j >= factores.length){
            j = 0
        }
        suma += cuerpo[i] * factores[j]
        j++
    }

    const dvCalculado = calcularDv(suma)

    let hex;

    if (dvCalculado == 11){

        hex = dv == 0 ? '#008000' : '#ff0000';
        
    }else if (dvCalculado == 10){

        hex = dv == 'k' || dvCalculado == 'K' ? '#008000' : '#ff0000';
        
    }else{

        hex = dv == dvCalculado ? '#008000' : '#ff0000';
        
    }

    elemento.style.borderColor = hex;
}

function calcularDv(suma){
    const modulo = suma % 11
    const dv = 11 - modulo
    return dv
}