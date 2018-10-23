import buttonLoading from "./ButtonLoading";


export default  function checkInaction(date){
    let targetDate = document.getElementsByClassName(`db_info-downpad_block-list_${date.innerText}`);
    if (targetDate[0].children.length === 0) {
        let height = counter.getNext.call(counter);
        let siblingHeight = date.parentElement.nextSibling.clientHeight
        if (height > siblingHeight) {
            console.log('limit');
            let dataForRemove = document.getElementsByClassName(`db_info-downpad_block-list_${date.innerText}`)[0];
            dataForRemove.remove();
            clearInterval(timer)
        }
        else {
            buttonLoading(date, height)
        }
    }
    else {
        console.log('it has children', targetDate[0].children.length)
        clearInterval(timer)
    }
}