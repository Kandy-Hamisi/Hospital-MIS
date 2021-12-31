const myForm = document.querySelector(".addRoom form"),
roomBtn = myForm.querySelector(".myButton input"),
errorDisplay = myForm.querySelector(".error-text");

myForm.onsubmit = (e)=>{
    e.preventDefault(); // preventing form from submitting
}



roomBtn.onclick = ()=>{
    
    // The start of Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "../controller/addRoom.php", true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if(data == "Success"){
                    // errorDisplay.classList.add("greener");
                    // errorDisplay.textContent = data;
                    // errorDisplay.style.display = "block";
                    location.href = 'addWard.php';
                }else{
                    errorDisplay.textContent = data;
                    errorDisplay.style.display = "block";
                }
            }
            
        }
    }

    // we have to send the form data through ajax to php
    let formData = new FormData(myForm); //Creating new formData Object
    xhr.send(formData); //sending the form data to php
}


