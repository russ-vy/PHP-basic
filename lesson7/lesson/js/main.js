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
            // console.log("Filename: " + files[i].name);
            // console.log("Type: " + files[i].type);
            // console.log("Size: " + files[i].size + " bytes");
        }
        console.log(files);

    }, false);

    function fileUpload(img, file) {
        let input = document.querySelector('input[type="file"]')

        let data = new FormData()
        data.append('file', input.files[0])

        fetch('/', {
            method: 'PUT',
            body: data
        })
    }

})
