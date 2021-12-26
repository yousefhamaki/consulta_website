/* globals Chart:false, feather:false */
//active page
let myactive = document.getElementById("active_button_bage");
let buttons_active = document.querySelectorAll('.valid');
// window.addEventListener('load', ()=>{buttons_active[parseInt(myactive.dataset.value)].classList.add('active')})
//remove_another pagination
let paginate_1 = document.querySelectorAll('.flex-1'),
  paginate_2 = document.querySelectorAll('.hidden');
paginate_1.length > 0 ? paginate_1.forEach(el => {el.remove();}) : ""
paginate_2.length > 0 ? paginate_2.forEach(el => {el.children[0].remove(); }) : ""