var uploadedFiles = [];


const files = document.querySelectorAll('#customFile');

Array.from(files).forEach(
    f => {

        f.addEventListener('change', e => {

            const span = document.querySelector('.customFile_file > span');

            // console.log(f);
            // console.log(f.files);

            if (!f.files.length) {
                span.innerHTML = 'Ningún archivo seleccionado';
            } else if (f.files.length > 1) {
                span.innerHTML = f.files.length + ' archivos seleccionados';
            } else {
                span.innerHTML = f.files[0].name;
            }
        })

    });


var btnFile = document.querySelector(".customFile_button");
var customFile = document.querySelector("#customFile");

btnFile.addEventListener('click', () => {
    customFile.click();
});

customFile.onchange = ({ target }) => {
    console.log(target.files);
    // let file = target.file[0];

    // if (file) {
    //     let fileName = file.name;
    //     uploadedFiles(fileName);
        
    // }
};

// function uploadedFiles(params) {
    
// }

