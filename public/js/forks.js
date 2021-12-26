let myoption = document.querySelectorAll('.law_value');
    
myoption.forEach(option =>{
    option.addEventListener("click", () =>{
        let child1 = option.children[0].children[1],
            child2 = option.children[0].children[2];
        if(child2.classList.contains("open")){
            child2.classList.remove("open");
            child1.classList.remove("rotat");
        }else{
            child2.classList.add("open");
            child1.classList.add("rotat");
        }
    })
})