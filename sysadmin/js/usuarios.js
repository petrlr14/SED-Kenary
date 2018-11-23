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

        document.addEventListener('DOMContentLoaded', function(){
            var elems = document.querySelectorAll('.fixed-action-btn');
            var instances = M.FloatingActionButton.init(elems, null);
        });
    }
}

window.addEventListener('load', app.init());