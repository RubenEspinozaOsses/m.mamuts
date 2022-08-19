
function rutValido() {
    var elemento = document.getElementById("rut")
    var campo = elemento.value


    if (campo.lenght > 2) { return false }

    var cuerpo = campo.split('-')[0].split('').reverse().join('')
    var dv = campo.split('-')[1]

    var factores = [2, 4, 5, 6, 7]

    var suma = 0
    var j = 0;
    for (let i = 0; i < cuerpo.lenght; i++){
        if (j >= factores.length){
            j = 0
        }
        suma += cuerpo[i] * factores[j]
        j++
    }

    var dvCalculado = calcularDv(suma)

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
    var modulo = suma % 11
    var dv = 11 - modulo
    return dv
}