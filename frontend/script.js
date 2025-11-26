let titleInput = document.getElementById('title_input');
let urlInput = document.getElementById('url_input');
let addButton = document.getElementById("add_btn");
let bookmarkList = document.getElementById("bookmark_list");
let toggleThemeBtn = document.getElementById("toggle_theme");


function checkNullInputs() {
    let input1 = titleInput.value.trim();
    let input2 = urlInput.value.trim();

    if (input1 === "" || input2 === "") {
        alert("All inputs are required");
        return false;
    }
    return true; 
}

function isValidURL(url) {
    const pattern =
        /^(https?:\/\/)?([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?$/;
    return pattern.test(url.trim());
}

addButton.addEventListener('click',()=>{
    let title = titleInput.value.trim();
    let url = urlInput.value.trim();
    if (!checkNullInputs()) return;
    if(isValidURL(url))
    {
        const bookmarkItem = document.createElement('li');
        bookmarkItem.classList.add("bookmark-item");
        bookmarkItem.innerHTML = 
        `<h4>${title}</h4><br>
        <a href="${url}" target="_blank">${url}</a>
            <section class="buttons"> 
            <button class="fav" title="Mark/Unmark as Favorite">☆</button>
            <button class="delete" title="Delete bookmark" >🗑︎</button>
            </section>`;
        bookmarkList.appendChild(bookmarkItem);
        urlInput.value = "";
        titleInput.value = "";
        addFavListener(bookmarkItem);
        addDeleteListener(bookmarkItem);
    }
    else {
        alert("The url entered is malformed");
    }
    
    
});

function addDeleteListener(
    bookmarkItem) {
    const deleteButton = 
        bookmarkItem.querySelector(".delete");
    deleteButton.addEventListener("click", () => { bookmarkItem.remove(); });
}

function addFavListener(bookmarkItem){
    const favButton = bookmarkItem.querySelector(".fav");

    favButton.addEventListener("click", () => {
        bookmarkItem.classList.toggle("favorite-item");
        if (bookmarkItem.classList.contains("favorite-item")) {
            favButton.textContent = "★";  
        } else {
            favButton.textContent = "☆"; 
        }
    });

}


toggleThemeBtn.addEventListener('click', () => {
    document.body.classList.toggle('light-theme');
    document.body.classList.toggle('dark-theme');

    toggleThemeBtn.textContent = document.body.classList.contains('light-theme') ? "☀️" : "🌙";
});
         