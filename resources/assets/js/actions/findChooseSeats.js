import db from '../firebase/index';

export default function findChooseSeats(fireDate) {
    const ref = db.ref('days').child(fireDate);
    ref.orderByValue().equalTo('seat-clicked').once('value').then((el) => {
        let ul = $(`.db_info-downpad_block-list_${fireDate}`);
        ul.empty();
        for (let key in el.val()) {
            let li = document.createElement('li');
            li.className = ` block-list_item block-list_item-${key}`;
            let textNode = document.createTextNode(`${key} мicце`);
            li.append(textNode);
            ul.append(li);
        }
    })
}