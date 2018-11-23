'use strict';

let app={
    init(){
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, null);
          });
    }
}

window.addEventListener('load', app.init());