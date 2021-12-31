const form = document.querySelector(".myForm form"),
submitBtn = form.querySelector(".myButton input"),
errorText = form.querySelector(".error-text");


form.onsubmit = (e) => {
    e.preventDefault();
}


submitBtn.onclick = () => {

    // The start of Ajax
    let xhr = new XMLHttpRequest(); //creating an XML object
    xhr.open("POST", "../controller/medhis.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                
                if (data = "Success") {
                    console.log("Success");
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }

    // sending the form data through ajax to php
    let formData = new FormData(form);
    xhr.send(formData);
    // console.log("Button functions");
    // console.log(form);
}