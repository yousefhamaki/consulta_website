let pagination = document.getElementsByClassName("flex items-center justify-between")[0];
        pagination.children[0].remove();
        pagination.children[0].children[0].remove();

let domain = "http://consulta.com:8000/";
//search function
function search(element){
    $.ajax({
        url: "search/law",
        method: "GET",
        data:{
            search: element
        },
        success: (data)=>{
            fetch_data(data)
        }
    })
}
function fetch_data(data){
    if(data.length > 0){
        data.forEach(el => {
            search_area.innerHTML += `<div class="law_value">
                                        <h3>${ el["law_name"] }</h3>
                                        <a href="${ domain + 'law/' + el["id"] }" class="link"></a>
                                    </div>`;
        });
    }else{
        search_area.innerHTML = `<h4 class='error_search'>.لا توجد نتائج بحث مشابهه
                                    <br/>
                                    .يمكنك البحث بكلمات مفتاحية اخرى
                                </h4>`;
    }
}


let search_button = document.querySelector(".search_button"),
    search_input = document.querySelector(".search_input"),
    search_area = document.querySelector(".search_element_area"),
    search_div = document.querySelector(".search_div"),
    law_area = document.querySelector(".law_elements_area");

search_button.addEventListener("click", ()=>{
    if(search_input.value !== ""){
        search_div.style.display = "inline";
        law_area.style.display = "none";
        search_area.textContent = "";
        search(search_input.value);
    }
})

let exit_search = document.querySelector(".exit_search");

exit_search.addEventListener("click", ()=>{
    law_area.style.display = "";
    search_div.style.display = "none";
    search_area.textContent = "";
})