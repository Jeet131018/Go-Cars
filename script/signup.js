function setBut(){    
    var mycheck= document.getElementById("terms");
    var but=document.getElementById("sub");
    if(mycheck.checked == true){
        but.disabled = false;
    }
    else{
        but.disabled = true;
    }   
}