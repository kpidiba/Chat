//let's get all required elements
const form = document.querySelector("form"),
eField = form.querySelector("email"),
eInput = eField.querySelector("input")
pfield = form.querySelector(".password"),
pInput = pField.querySelector("input");

form.onsubmit = (e)=>{
    e.preventDefault();
    if(eInput.value == ""){
        eField.classList.add("shake");
    }
}