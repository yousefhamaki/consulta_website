//function to get option details

function consulta_options(){
    let myinputs = document.querySelectorAll(".consulta_input");
    let options_of_consulta = document.querySelectorAll(".servies_type");

    options_of_consulta.forEach(option =>{
        option.addEventListener("click", ()=>{
            let mynull = [];
            myinputs.forEach(input =>{
                if(input.value == ""){
                    mynull[mynull.length] = input.name
                }
            })
            if(!mynull.length > 0){
                $.ajax({
                    url: "/get_option_of_consulta/option/" + option.dataset.value,
                    data: {
                        option: option.dataset.value
                    },
                    method: "GET",
                    success: function (response) {
                        document.querySelector(".option_chooses_form_area").innerHTML = response
                        valid_exit_button()
                        add_option_data_to_form()
                    }
                });
            }else{
                alert("يجب ملء جميع البيانات قبل أختيار نوع الخدمة", "warning")
            }
            
        })
    })
}

function valid_exit_button(){
    let exit_button = document.querySelector(".exit_button");

    exit_button.addEventListener("click", ()=>{
        let form_options = document.querySelectorAll(".option_chooses_form");
        form_options.forEach(data =>{
            data.remove();
        })
        consulta_options()
    })
}
consulta_options()

function add_option_data_to_form(){
    let mysubmit = document.querySelector(".option_chooses_form .submit");
    mysubmit.addEventListener("click", ()=>{
        let time = document.getElementById("time_data");
        let form_data = document.querySelector(".consulta_form_data");

        let input_time = document.createElement("input")
        input_time.type = "hidden"
        input_time.name = "time"
        input_time.className = "time_value"
        input_time.value = time.value

        let input_service = document.createElement("input")
        input_service.type = "hidden"
        input_service.name = "service_id"
        input_service.className = "service_id"
        input_service.value = document.querySelector(".service_name").id

        let mytime_input = document.querySelectorAll(".time_value");
        if(mytime_input !== null){
            mytime_input.forEach(input =>{
                input.remove()
            })
        }

        let service_input = document.querySelectorAll(".service_id");
        if(service_input !== null){
            mytime_input.forEach(input =>{
                input.remove()
            })
        }
        form_data.appendChild(input_service)
        form_data.appendChild(input_time)

        document.querySelector(".submit_consulta").click()
    })

}


let submit_button = document.querySelector(".consulta_form_data .submit");
let submit_blur = document.querySelector(".consulta_form_data .blur");

let myblur = [submit_blur];

let country_code = document.getElementById("country_code");
let country = document.getElementById("country");

function readTextFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}

//usage:
readTextFile("../js/json/countries.json", function(text){
    var data = JSON.parse(text);

    $.get("http://ip-api.com/json", function(res) {
            data.forEach(d =>{
                //country code
                let option = document.createElement("option");
                option.textContent = d.dialCode + " ( " + d.code + " ) ";
                option.value = d.dialCode
                country_code.appendChild(option)
        
                //country
                let option2 = document.createElement("option");
                option2.textContent = d.name
                option2.value = d.name
                
                if(res.countryCode == d.code){
                    option2.selected = "selected";
                    option.selected = "selected";
                }
                country.appendChild(option2)
            })
        }, "jsonp");

    
});

//get location
// var requestUrl = "http://ip-api.com/json";

// $.ajax({
//   url: requestUrl,
//   type: 'GET',
//   success: function(json)
//   {
//       console.log(json)
//     console.log("My country is: " + json.country);
//   },
//   error: function(err)
//   {
//     console.log("Request failed, error= " + err);
//   }
// });
