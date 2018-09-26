export default function  drawSpaceName(name){
    let goalBlock =  $('.place_block-info_block-name');
    goalBlock.empty();
    console.log(name.children[1].children[0].innerText);
    let targetSuitName = document.createTextNode(name.children[1].children[0].innerText);
    goalBlock.append(targetSuitName)
}