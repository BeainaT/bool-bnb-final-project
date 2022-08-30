window.onload = () => {
    let pswConfirm = document.getElementById("password-confirm");
    let psw = document.getElementById("password");
    let alert = document.getElementById("user-alert");
    let sendForm = document.getElementById("disabled");
    pswConfirm.addEventListener("focus", function() {
    let check = false;
    do {
        pswConfirm.addEventListener("keyup", function() {
            if(psw.value === pswConfirm.value) {
                sendForm.disabled = false;
                alert.innerHTML = '';
                pswConfirm.style.borderColor = "green";
                check = true;
            } else {
                alert.innerHTML = 'Le passwords devono coincidere';
                pswConfirm.style.borderColor = "red";
                sendForm.disabled = true;
            }
        });
    } while(check == true);
  });
}
