let myel = document.querySelectorAll(".option_added");
let menu_button = document.querySelector(".menu_button");
let menu = document.querySelector(".menu");
let menu_options = document.querySelectorAll(".menu_option");

//functions
function responsive(){
    //responsive menu options
    myel.forEach(element => {element.style.top = (element.parentElement.clientHeight + 5) + "px" })
    if(window.innerWidth < 800){menu_option()}else{menu_optionfull()}
}
function menu_option(){
    menu_options.forEach(element =>{
        element.addEventListener("click", ()=>{
            let el = element.lastElementChild;
            el.classList.contains("phone") ? el.classList.remove("phone") : el.classList.add("phone")
        })

        element.onmouseover  = function() {
            let el = element.lastElementChild;
            el.classList.add("show")
        }

        element.onmouseleave  = function(){
            let el = element.lastElementChild;
            el.classList.remove("show")
        }

    })
}

function menu_optionfull(){
    menu_options.forEach(element =>{
        element.onmouseover  = () =>{
            let el = element.lastElementChild;
            el.classList.add("show_partitions")
        }

        element.onmouseleave  = () =>{
            let el = element.lastElementChild;
            setTimeout(()=>{
                el.classList.remove("show_partitions")
            }, 100)
        }

    })
}

//events
responsive()
window.addEventListener("resize", ()=>{responsive()})

menu_button.addEventListener("click", () =>{menu.classList.contains("show") ? menu.classList.remove("show") : menu.classList.add("show") })


//footer
let footer_options = document.querySelectorAll(".data_section p");

footer_options.forEach(option =>{
    option.addEventListener("click", ()=>{
        if(option.dataset.page !== undefined){
            location.href = 'http://consulta.com:8000/' + option.dataset.page;
        }
    })
})

let awesome_el = document.querySelectorAll(".awesome_option");
let drop_el = document.querySelectorAll(".awesome_option .dropdown-menu");

awesome_el.forEach(el => {
    el.addEventListener("click", ()=>{
        if(el.classList.contains("actived")){
            el.classList.remove("actived")
            drop_el.forEach(el =>{
                el.style.display = "none"
            })
        }else{
            awesome_el.forEach(el => {
                el.classList.remove("actived")
            })
            el.classList.add("actived")
            drop_el.forEach(el =>{
                el.style.display = "none"
            })
            el.lastElementChild.style.display = "inline";
        }
        
    })
})