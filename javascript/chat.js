const form = document.querySelector(".typing-area"), inputfield = form.querySelector(".infield"), sendbtn = form.querySelector("button"), chat = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault(); //preventing the default empty form ot be submitted
}

sendbtn.onclick = () => {

    let xhr = new XMLHttpRequest(); //creating XML object

    xhr.open("POST", "php/insert.php", true); //arguments are method,url,async
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputfield.value = ""; //once the msg is inserted into the DB then leave the input field blank
            }
        }
    }
    let formData = new FormData(form); //creating form data object
    xhr.send(formData);

}

setInterval(() => {

    var oldscrollHeight = $(".chat-box")[0].scrollHeight - 20;

    let xhr = new XMLHttpRequest(); //creating XML object

    xhr.open("POST", "php/getmsg.php", true); //arguments are method,url,async
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                chat.innerHTML = data;
                var newscrollHeight = $(".chat-box")[0].scrollHeight - 20;
                if (newscrollHeight > oldscrollHeight) {
                    $(".chat-box").animate({
                        scrollTop: newscrollHeight
                    }, 'normal'); //Autoscroll to bottom of div
                }
            }
        }
    }

    let formData = new FormData(form); //creating form data object
    xhr.send(formData);

}, 500);