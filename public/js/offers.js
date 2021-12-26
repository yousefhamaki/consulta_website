let mycreateform = document.querySelector('.add_offer');
let offername = document.querySelector('.offer_name');
let offerphoto = document.querySelector('.offer_photo');
let offerprice = document.querySelector('.offer_price');

//errors elements
let nameerr = document.querySelector('.name_err');
let priceerr = document.querySelector('.price_err');

mycreateform.addEventListener('click', e =>{
    e.preventDefault();
    let form = new FormData(document.getElementById('insert_form'));
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: 'create-offer',
        data: form,
        cache:false,
        processData: false,
        contentType: false,
        
        success: output=>{
            nameerr.textContent = '';
            priceerr.textContent = '';
            if(output.status == true){
              offername.value = ''
              offerphoto.value = ''
              offerprice.value = ''
              successAlert(output.msg)
            }else{
              successAlert(output.msg)
            }
        },
        error: err =>{
          nameerr.textContent = '';
          priceerr.textContent = '';

          if(err.responseJSON.errors !== undefined){
            if(err.responseJSON.errors.name){
                nameerr.textContent = err.responseJSON.errors.name[0];
            }
            if(err.responseJSON.errors.price){
                priceerr.textContent = err.responseJSON.errors.price[0];
            }
          }
            
        }
    })
})
