function submit_automatically(){

    if (document.getElementById('archivos').files.length > 0 && document.getElementById('eta-ejecucion').value != 0){
        document.getElementById('form-archivos').submit();
    }
    
}