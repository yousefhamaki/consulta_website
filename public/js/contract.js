let options_button = document.querySelectorAll('.options_button');
options_button.forEach(button =>{
    button.addEventListener('click',() =>{
        let el = button.children[1].classList; 
        el.contains('hide') ? el.remove('hide') : el.add('hide')
    })
})