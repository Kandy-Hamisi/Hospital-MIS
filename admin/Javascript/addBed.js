const initForm = document.querySelector(".addBed form"),
bedBtn = initForm.querySelector(".myButton input"),
errorShow = initForm.querySelector(".error-text");

initForm.onsubmit = (e)=>{
    e.preventDefault(); // preventing form from submitting
}

window.onload = () => {
    console.log(initForm);
}

bedBtn.onclick = ()=>{
    
    // The start of Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "../controller/addBed.php", true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if(data == "Success"){
                    // errorDisplay.classList.add("greener");
                    // errorDisplay.textContent = data;
                    // errorDisplay.style.display = "block";
                    location.href = 'addBed.php';
                }else{
                    errorShow.textContent = data;
                    errorShow.style.display = "block";
                }
            }
            
        }
    }

    // we have to send the form data through ajax to php
    let formData = new FormData(initForm); //Creating new formData Object
    xhr.send(formData); //sending the form data to php
}


