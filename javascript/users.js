const searchbar = document.querySelector(".users .search input"), searchbtn = document.querySelector(".users .search button"), userslist = document.querySelector(".users .users-list");


searchbar.onkeyup = () => {
    let searchterm = searchbar.value;

    //disabling the 500ms refresh on users list 
    if (searchterm != "") {
        searchbar.classList.add("active");
    } else {
        searchbar.classList.remove("active");
    }


    let xhr = new XMLHttpRequest(); //creating XML object

    xhr.open("POST", "php/search.php", true); //arguments are method,url,async
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                userslist.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchterm=" + searchterm);
}


setInterval(() => {
    let xhr = new XMLHttpRequest(); //creating XML object

    xhr.open("GET", "php/users.php", true); //arguments are method,url,async
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                //if we are searching then there wont be refresh

                if (!searchbar.classList.contains("active")) {
                    userslist.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500);//this will run every 500ms