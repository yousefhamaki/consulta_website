//functions to make delete offer in database
function check_removes(){
    let remove_button = document.querySelectorAll(".remove_offer");
    remove_button.forEach(button =>{
        button.addEventListener('click', e => {
            e.preventDefault();
            remove_alert(button);
        })
    })
}
function remove_alert(el){
    let offername = el.parentElement.parentElement.children[1].textContent;
    document.body.innerHTML += `
        <section class='delete_con'>
            <h5>(${offername})هل انت متأكد من حذف هذا العرض</h5>
            <button class='btn btn-success delete_confirm' data-value='true'>نعم</button>
            <button class='btn btn-danger delete_confirm'  data-value='false'>لا</button>
        </section>
    `;
    let myexitbutton = document.querySelectorAll('.delete_confirm');
    let offerid = el.dataset.value;
    myexitbutton.forEach(button => {
        button.addEventListener('click', () =>{
            if(button.dataset.value == 'true'){
                $.ajax({
                    url: 'removeoffer',
                    method: 'post',
                    data: {
                        id: offerid
                    },
                    success: output =>{
                        if(output.status == true){
                            document.getElementById('offer' + offerid).remove();
                            successAlert(output.msg)
                        }
                    }
                });
            }
            document.querySelector('.delete_con').remove();
            check_removes()
        })
    });
}
check_removes();