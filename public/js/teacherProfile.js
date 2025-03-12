var l1 = document.querySelector(".l1")
var l2 = document.querySelector(".l2")
var aright = document.querySelector(".aright")
var bright = document.querySelector(".bright")

function showAccount() {
    l1.classList.add("selectedOne")
    l2.classList.remove("selectedOne")

    aright.style.display = "flex"
    bright.style.display = "none"
}

function showUpload() {
    l1.classList.remove("selectedOne")
    l2.classList.add("selectedOne")

    aright.style.display = "none"
    bright.style.display = "flex"
}
//Something to write
