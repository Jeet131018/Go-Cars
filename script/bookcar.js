function showCar(){
    var selcar=document.getElementById('cmodel').value;
    var setimg=document.getElementById('cardisplay');
    if(selcar=="swift"){
        setimg.src="cars/swift.png";
    }
    else if(selcar=="verna"){
        setimg.src="cars/verna.jpeg";
    }
    else if(selcar=="creta"){
        setimg.src="cars/creta.jpeg";
    }
    else if(selcar=="nocar"){
        setimg.src="cars/nocar.jpg";
    }
    if(selcar=="nocar"){
        but.disabled = true;
    }
    else{
        but.disabled = false;
    }
}