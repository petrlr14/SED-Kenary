'use strict';

 const app={
    init(){
        let button=document.querySelector("#form-button");
        button.addEventListener("click", event=>{
            event.preventDefault();
            let form=document.forms["login"];
            console.log(form.elements["username"].value);
            console.log(form.elements["password"].value);
        });
    }
};

window.addEventListener("load", app.init());
