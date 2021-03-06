'use strict';

let app={
    init(){
        let deletes=document.querySelectorAll(".delete");
        deletes.forEach((element)=>{
            element.addEventListener('click', function(e){
                e.preventDefault();
                let id=this.parentElement
                    .parentElement
                    .querySelector(".id")
                    .innerText;
                window.location=`${this.href}?user_id=${id}`;
            });
        });
    }
}

window.addEventListener('load', app.init());