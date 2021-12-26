//var
let email = document.getElementById("yourEmail");
let form = document.querySelector(".needs-validation");


email.addEventListener("keyup", () =>{

    if(email.value.length > 4){
        email.classList.remove("not_valid");
        email.classList.remove("valid");
        $.ajax({
            type: 'get',
            url: 'check_email/' + email.value,
            cache:false,
            processData: false,
            contentType: false,
            success: output=>{
                if(output.status == "true"){
                    email.classList.remove("not_valid");
                    email.classList.add("valid");
                }else{
                    email.classList.add("not_valid");
                    email.classList.remove("valid");
                }
            },
        })
    }else{
        email.classList.add("not_valid");
        email.classList.remove("valid");
    }
})

form.addEventListener("submit", e  =>{
    if(!email.classList.contains("valid")){
        email.focus();
        e.preventDefault();
    }
})