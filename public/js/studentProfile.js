var sections = {
    l1: document.querySelector(".aright"),
    l2: document.querySelector(".bright"),
}

function showSection(selected) {
    Object.keys(sections).forEach((key) => {
        document.querySelector("."+key).classList.toggle("selectedOne", key == selected);
        sections[key].style.display = key == selected ? "flex" : "none";
    })
}
