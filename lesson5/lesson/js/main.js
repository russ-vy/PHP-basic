"use strict"

document.addEventListener('DOMContentLoaded',()=>{
    let control = document.getElementById("customFile");

    control.addEventListener("change", function(event) {
        // Когда происходит изменение элементов управления, значит появились новые файлы
        let i = 0,
            files = control.files,
            len = files.length;

        for (; i < len; i++) {
            document.querySelector('.form-file-text').textContent = files[i].name;
        }
        console.log(files);

    }, false);
})
