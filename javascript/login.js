const form = document.querySelector(".login form"), continueBtn = form.querySelector(".signupbtn"), errortxt = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault(); //preventing the default empty form ot be submitted
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest(); //creating XML object

    xhr.open("POST", "php/login.php", true); //arguments are method,url,async
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if (data === "success") {
                    location.href = "../users.php"
                }
                else {
                    errortxt.style.transition = "all 0.5s";
                    errortxt.textContent = data;
                    errortxt.style.background = "rgb(235, 175, 175)";
                    errortxt.style.color = "rgb(192, 7, 7)";
                    errortxt.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form); //creating form data object
    xhr.send(formData);
}