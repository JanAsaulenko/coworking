import splitDate from '../functionHelpers/splitDate';

class Draw {
    constructor() {}
    drawFormList(ul) {
        const blockForImplement = $('.block_with_form-db_info');
        blockForImplement.empty();
        ul.map((i) => {
            let el = splitDate(i);
            let downPadList = $(`<div class=db_info-downpad_block></div>`);
            let ul = document.createElement('ul');
            ul.className = `db_info-downpad_block-list db_info-downpad_block-list_${el}`;
            downPadList.append(ul);
            blockForImplement.append(downPadList);
        })
    }
}

export default new Draw();