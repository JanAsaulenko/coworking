
class Draw {
    constructor() {
    }

    drawFormList(date, blockForImplement) {
        let targetDate = document.getElementsByClassName(`db_info-downpad_block-list_${date}`)[0];
        if (!targetDate) {
            let ul = document.createElement('ul');
            ul.className = `db_info-downpad_block-list db_info-downpad_block-list_${date}`;
            let textNode = document.createTextNode(date);
            ul.append(textNode);
            blockForImplement.append(ul);
        }
        else {
            return 0;
        }
    }
}

export default new Draw();