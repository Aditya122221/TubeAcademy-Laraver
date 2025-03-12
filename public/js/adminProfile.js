var aright = document.querySelector(".aright")
var bright = document.querySelector(".bright")
var cright = document.querySelector(".cright")
var dright = document.querySelector(".dright")
var l1 = document.querySelector(".l1")
var l2 = document.querySelector(".l2")
var l3 = document.querySelector(".l3")
var l4 = document.querySelector(".l4")

function showAccount() {
    l1.classList.add("selectedOne")
    l2.classList.remove("selectedOne")
    l3.classList.remove("selectedOne")
    l4.classList.remove("selectedOne")

    aright.style.display = "flex"
    bright.style.display = "none"
    cright.style.display = "none"
    dright.style.display = "none"
}

function teacherDetail() {
    l1.classList.remove("selectedOne")
    l2.classList.add("selectedOne")
    l3.classList.remove("selectedOne")
    l4.classList.remove("selectedOne")

    aright.style.display = "none"
    bright.style.display = "flex"
    cright.style.display = "none"
    dright.style.display = "none"
}

function studentDetail() {
    l1.classList.remove("selectedOne")
    l2.classList.remove("selectedOne")
    l3.classList.add("selectedOne")
    l4.classList.remove("selectedOne")

    aright.style.display = "none"
    bright.style.display = "none"
    cright.style.display = "flex"
    dright.style.display = "none"
}

function queryDetail() {
    l1.classList.remove("selectedOne")
    l2.classList.remove("selectedOne")
    l3.classList.remove("selectedOne")
    l4.classList.add("selectedOne")

    aright.style.display = "none"
    bright.style.display = "none"
    cright.style.display = "none"
    dright.style.display = "flex"
}
