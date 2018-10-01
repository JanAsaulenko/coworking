import db from '../firebase/index';
import drawListItem from './drawListItem'
import EventBus from '../PubSub'
export default function findChooseSeats(fireDate) {
    const ref = db.ref('days').child(fireDate);
    let ul = $(`.db_info-downpad_block-list_${fireDate}`);
    ref.orderByValue().equalTo('seat-clicked').on('value', ((el) => {
        drawListItem(el, ul);
     })
)
}