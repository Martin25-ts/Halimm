const myinput = document.getElementById("qty-input");


function stepper(btn){
    let id = btn.id;
    let min = 1;
    let max = btn.getAttribute("max");
    let step = 1;
    let val = myinput.getAttribute("value");
    let calcStep = (id == "increment") ? (step * 1) : (step * -1);

    let newvalue = parseInt(val) + calcStep;


    if(newvalue >= min && newvalue <= max){
        myinput.setAttribute("value", newvalue);
    }
}
