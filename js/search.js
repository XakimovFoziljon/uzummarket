// let input = document.querySelector("header input");
// let title = document.querySelectorAll("h2.title");
// input.addEventListener("input", function () {
//     for (let i = 0; i < title.length; i++) {
//         let city = title[i].innerHTML;

//         city = city.toLowerCase();
//     }
// })
     
// let searchInput = document.querySelector(".seacrh");

// searchInput.addEventListener('input', function filterList(){
    
// const filter = searchInput.value.toLowerCase();
// const listItems = document.querySelectorAll('.title');

// listItems.forEach((item) =>{
//     let text = item.textContent;
//     if(text.toLowerCase().includes(filter.toLowerCase())){
//         item.style.display = '';
//     }else{
//         item.style.display = 'none';
//     }
// })
// })

let input = document.querySelector("header input");
let card = document.querySelectorAll(".card");
input.addEventListener("input", function () {
    const filter = input.value.toLowerCase();
    const listItems = document.querySelectorAll('.card');

    listItems.forEach((item) =>{
        let text = item.textContent;
        if(text.toLowerCase().includes(filter.toLowerCase())){
            item.style.display = '';
        }else{
            item.style.display = 'none';
        }
    })
})
let inputd = document.querySelector(".input");
inputd.addEventListener("input", function () {
    const filter = inputd.value.toLowerCase();
    const listItems = document.querySelectorAll('.card');

    listItems.forEach((item) =>{
        let text = item.textContent;
        if(text.toLowerCase().includes(filter.toLowerCase())){
            item.style.display = '';
        }else{
            item.style.display = 'none';
        }
    })
})