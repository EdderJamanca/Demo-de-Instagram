import Dropzone from "dropzone";

let myDropzone = new Dropzone("#img_post",{
    dictDefaultMessage:'Sube aqui tu imagen',
    acceptedFiles:".png,.jpg,.jpeg,.gif",
    addRemoveLinks:true,
    dictRemoveFile:"Borrar Archivo",
    maxFile:1,
    uploadMultiple:false,
    init:function(){

    }
});

myDropzone.on('success',function(file,response){
    console.log('success',response);
    let component=document.querySelector('.dropzone .dz-preview .dz-remove');

    component.style=' background: red;border-radius: 16px;color: white;';

    document.querySelector('#urlimagen').value=response.imagen;


});



myDropzone.on('error',function(file,message){
    console.log('error',message);
    document.querySelector('#urlimagen').value="";
})

myDropzone.on('removedfile',function(){
    // console.log('removedfile')
    document.querySelector('#urlimagen').value="";
})
