// let mycreateform = document.querySelector('#addpost');
// let titleerr = document.querySelector('.title_err');
// let contenterr = document.querySelector('.content_err');
// let inputs = document.querySelectorAll('form input');
// let textarea = document.getElementById('postcontent');
// mycreateform.addEventListener('click', e =>{
//     e.preventDefault();
//     let form = new FormData(document.getElementById('insert_form'));
//     $.ajax({
//         type: 'post',
//         enctype: 'multipart/form-data',
//         url: 'insert',
//         data: form,
//         cache:false,
//         processData: false,
//         contentType: false,
        
//         success: output=>{
//             titleerr.textContent = '';
//             contenterr.textContent = '';
//             if(output.status == true){
//                 inputs.forEach(input =>{
//                     input.value = '';
//                 })
//                 textarea.value = '';
//               successAlert(output.msg)
//             }else{
//               successAlert(output.msg)
//             }
//         },
//         error: err =>{
//           if(err.responseJSON.errors !== undefined){
//             if(err.responseJSON.errors.title){
//                 titleerr.textContent = err.responseJSON.errors.title[0];
//             }
//             if(err.responseJSON.errors.content){
//                 contenterr.textContent = err.responseJSON.errors.content[0];
//             }
//           } 
//         }
//     })
// })
