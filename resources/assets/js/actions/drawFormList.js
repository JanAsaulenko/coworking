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
            let nameOfList = $(`<div class="db_info-downpad_block-list-name"></div>`);
            nameOfList.append(i);
            downPadList.append(nameOfList);
            downPadList.append(ul);
            blockForImplement.append(downPadList);
        });
        blockForImplement.on('click', (event)=>{
            let target = event.target;
            let hiddingList = target.parentNode.getElementsByTagName('ul')[0];
            hiddingList.children = !hiddingList.children;
            console.log(hiddingList)
        })
    }
}

export default new Draw();