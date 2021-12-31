const form = document.querySelector(".updateForm form"),
errorText = form.querySelector(".error-text"),
submitBtn = form.querySelector(".myButton input");

form.onsubmit = (e) => {
    e.preventDefault();
}


submitBtn.onclick = () => {
    
    // The start of AJax
    let xhr = new XMLHttpRequest();// creating new xml object
    xhr.open("POST", "../dashboard/edit-doctor.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if (data == "Success") {
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

    // sending the form data through ajax to php
    let formData = new FormData(form);
    xhr.send(formData);
}