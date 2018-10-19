import _ from 'lodash'
import EventBus from "../PubSub";

export default function drawListItem(target, ul) {
    ul.empty();
    let count = 0;
    let arr = [];
    Array.prototype.clean = function (empty) {
        for (let i = 0; i < this.length; i++) {
            if (this[i] == empty) {
                this.splice(i, 1);
                i--;
            }
        }
        return this
    };

    if (!_.isArray(target.val().__proto__.constructor())) {
        let test = Object.keys(target.val());
        arr = test.clean(undefined);
    }
    else {
        let test = Object.assign({}, target.val());
        arr = Object.keys(test);
    }

    arr.forEach((el) => {
        count++;
        let li = document.createElement('li');
        li.className = ` block-list_item block-list_item-${el}`;
        let textNode = document.createTextNode(`${el} мicце`);
        li.append(textNode);
        ul.append(li)
    });
    let createLiBlock = document.createElement('li');
    createLiBlock.append(`Вартість за день:${Number(count) * 90} грн`);
    ul.append(createLiBlock);

    EventBus.publish()
}