let pagination = document.getElementsByClassName("flex items-center justify-between")[0];
        if(pagination !== undefined){
            pagination.children[0].remove();
            pagination.children[0].children[0].remove();
        }

        //links
        let links = document.querySelectorAll(".link_value");

        links.forEach(el =>{
            el.addEventListener("click", () => {
                window.href = el.dataset.link;
            })
        })

//links go

let pagination_links = document.querySelectorAll(".link_value");
let link_go = document.querySelector(".link_go");

pagination_links.forEach(link => {
    link.addEventListener("click", () =>{
        console.log(link.dataset.link)

        link_go.href = link.dataset.link;
        link_go.click()

    })
})