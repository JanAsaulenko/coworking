export default function errorRange(text) {
    $('.datepicker__error-block').show();

    $('.seats-block_buttons').hide();
    let errBlock = $('.datepicker__error-block');
    errBlock.empty();
    let infoMessage = document.createElement('span');
    infoMessage.setAttribute('class', 'error-block__message');
    const textNode = document.createTextNode(text);
    infoMessage.appendChild(textNode);
    console.log(infoMessage);
    errBlock.append(infoMessage);
}