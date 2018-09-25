import db from '../firebase/index';

export default function findChooseSeats(fireDate) {
    const ref = db.ref('days').child(fireDate);
    ref.orderByValue().equalTo('seat-clicked').once('value').then((el) => {
        console.log(fireDate);
        let ul = $(`.db_info-downpad_block-list_${fireDate}`);
        ul.empty();
        let arr = [...el.val()];
        for (let key in arr[0]) {
            let li = document.createElement('li');
            li.className = ` block-list_item block-list_item-${key}`;
            let textNode = document.createTextNode(`${key} мicце`);
            li.append(textNode);
            ul.append(li);
        }
    })
}