
var name = document.forms['form']['name'];
var email = document.forms['form']['email'];
var password = document.forms['form']['password'];


var email_error = document.getElementById('email_error');
var password_error = document.getElementById('password_error');


var regexp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

email.addEventListener('textInput', email_Verify);
password.addEventListener('textInput', password_Verify);




function validated(){


    // if(name.value.length < 9){
    //     name.style.border = "1px solid red";
    //     name_error.style.display = "block";
    //     name.focus();
    //     return false
    // }

    if(email.value.match(regexp)){
           
            
        }else{
            email.style.border = "1px solid red";
            email_error.style.display = "block";
            email.focus();
            return false
           
        }
        
            
    

    if(password.value.length < 8){
        password.style.border = "1px solid red";
        password_error.style.display = "block";
        password.focus();
        return false
    }
}

function email_Verify(){
    if(email.value.match(regexp)){
        email.style.border = "1px solid silver";
        email_error.style.display =  "none";
        email.focus();
        return true
}
}

function password_Verify(){
    if(password.value.length >= 7){
        password.style.border = "1px solid silver";
        password_error.style.display =  "none";
        password.focus();
        return true
}


}

