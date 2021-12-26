let info_nputs = document.querySelectorAll(".form-group input");
let info_text = document.querySelectorAll(".form-group textarea");

//to make blur on focus to any information input
info_nputs.forEach(input =>{input.addEventListener("focus", ()=>{input.blur() }) })
info_text.forEach(input =>{input.addEventListener("focus", ()=>{input.blur() }) })

let submit_message = document.querySelector("#send_message");

submit_message.addEventListener("click", e=>{
    e.preventDefault();
    //ajax
    let form = new FormData(document.getElementById('send_message_form'));
    let room_id = document.getElementById("room_id").value;
    let add_message = document.getElementById('send_message_form').action;
    $.ajax({
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            
            document.querySelector(".progress").style.display = "";
            xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                percentComplete = parseInt(percentComplete * 100);
            
                $('.progress-bar').width(percentComplete+'%');
                $('.progress-bar').html(percentComplete+'%');
            
              }
            }, false);
            
            return xhr;
        },
        type: 'post',
        enctype: 'multipart/form-data',
        url: add_message,
        data: form,
        cache:false,
        processData: false,
        contentType: false,
        success: output=>{
            if(output['status'] == 0){
                alert(output['msg'], "danger")
            }else if(output['status'] == 1){
                let inputs = document.getElementById('send_message_form').children;
                for(let i = 0; i < inputs.length - 2; i++){
                    inputs[i].value = "";
                }
                alert(output['msg'], "success")

            }
            document.querySelector(".progress").style.display = "none";
        }
    })
})

//files button
let file_button = document.querySelector(".upload_file");
let file_input = document.getElementById("files_sending");

file_button.addEventListener("click", ()=>{
    file_input.click()
    let file_check = setTimeout(()=>{
        if(file_input.value !== ""){

        }
    }, 400);
})

function chat_scroll(){
    let chat_scroll = document.querySelector(".messages_area");

    chat_scroll.scrollTop = chat_scroll.scrollHeight
}
chat_scroll()

setInterval(()=>{
    let new_message = document.querySelector(".messages_link");
    let messages_length = document.querySelectorAll(".message_section");

    new_message = new_message.dataset.link;
    console.log(messages_length)
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: new_message,
        data: {
            messages: messages_length
        },
        cache:false,
        processData: false,
        contentType: false,
        success: output=>{
            console.log(output)
        }
    })
}, 1000)