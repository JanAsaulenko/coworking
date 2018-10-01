export default function makeObj(data){
    // console.log(data.target.innerText)
    return{
        name:data.innerText,
        type:data.className
    }
}