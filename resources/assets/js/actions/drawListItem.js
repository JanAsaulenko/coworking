import Constants from '../constants/constants'
export default function drawListItem(event, date) {
    console.log(event.target.className);
    switch (event.target.className) {
        case Constants.RESERVE_BY_YOURSELF :
            console.log('reserve');
            $(`.right_form-item_${event.target.innerText}`).remove();
            break;
        case Constants.FREE_SEAT:
            let dateUl = document.getElementsByClassName(`db_info-downpad_block-list_${date}`)[0];
            let li = document.createElement('li');
            li.className = `right_form-item_${event.target.innerText}`;
            let textNode = document.createTextNode(event.target.innerText);
            li.append(textNode);
            console.log(li, dateUl);
            dateUl.append(li);
            break;
        default:
    }
}