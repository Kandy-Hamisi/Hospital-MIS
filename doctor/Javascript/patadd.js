const form = document.querySelector(".addPatient form"),
continueBtn = form.querySelector(".myButton input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); // preventing form from submitting
}



continueBtn.onclick = ()=>{
    
    // The start of Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "../controller/patientAdd.php", true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if(data == "Success"){
                    // location.href = "dashboard/index.php";
                    errorText.classList.add("greener");
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
            
        }
    }

    // we have to send the form data through ajax to php
    let formData = new FormData(form); //Creating new formData Object
    xhr.send(formData); //sending the form data to php
}


