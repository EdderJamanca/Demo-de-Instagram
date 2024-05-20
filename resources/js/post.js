import axios from "axios";

const url='http://127.0.0.1:8000';

const apiAxios=axios.create({
    baseURL:`${url}`
})


// async function showPost(post,username){
//     console.log('post',post);
// }

function formatoFecha(fecha_hora){
    let fecha=fecha_hora.splice(' ');
    let arrfecha=fecha.splice('-');
    return `${arrfecha[2]/arrfecha[1]/arrfecha[0]}`
}
