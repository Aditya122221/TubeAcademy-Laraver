var sections = {
    l1: document.querySelector(".aright"),
    l2: document.querySelector(".bright"),
    l3: document.querySelector(".cright"),
    l4: document.querySelector(".dright"),
};

function showSection(selected) {
    Object.keys(sections).forEach((key) => {
        document.querySelector("." + key).classList.toggle("selectedOne", key === selected);
        sections[key].style.display = key === selected ? "flex" : "none";
    });
}
