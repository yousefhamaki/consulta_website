let myelement = document.querySelectorAll(".value_area");
let child_el = document.querySelectorAll(".option_option");
let result_area = document.querySelector(".search_result_area");
let search_input = document.getElementById("law_search");
let search_button = document.querySelector(".search_button");
let data_area = document.querySelector(".data_area");

function search(el, value){
    let result_array = [],
        text_length = value.length;

    el.forEach(element =>{
        let mytext_el = element.children[0].textContent.slice(0, text_length);

        if(mytext_el == value){
            result_array.push(element)
        }
    });
        
    el.forEach(element => {
        let myarray = element.children[0].textContent.split("-");  

        myarray.forEach(el =>{
            let final_array = el.split(" ");

            final_array.forEach(el =>{
                let ele = el.slice(0, text_length);
                let mytext = value.split(" ");
                mytext.forEach(text=>{
                    if(ele == text){
                        result_array.push(element)
                    }
                })
            })
        })
    });
    
    return result_array;    
}
function get_result(){
    result_area.textContent = "";
    let value = search_input.value;

    if(value !== ""){
        result_area.classList.remove("hide");
        data_area.classList.add("hide");

        let result2 = search(child_el, value);
        result2.forEach(res =>{
            result_area.innerHTML += `<div class='law_value'> <div class='${res.className}'> ${res.innerHTML} </div> </div>`;
        })

        let result1 = search(myelement, value);
        result1.forEach(res =>{
            result_area.innerHTML += `<div class='${res.parentElement.className}'> ${res.parentElement.innerHTML} </div>`;
        })

        if(result_area.textContent == ""){
            result_area.innerHTML = "<h3>لا توجد نتائج</h3>";
        }
    }else{
        result_area.classList.add("hide");
        data_area.classList.remove("hide");
    }
}
search_input.addEventListener("input", ()=>{
    get_result()
});
search_button.addEventListener("click", ()=>{
    get_result()
})

