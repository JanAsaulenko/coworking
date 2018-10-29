export default function makeOneActiveButton(event) {
    let button = event.target;
    let buttons = $('.seats-block-button');
    for (let i = 0; i < buttons.length; i++) {
        if (buttons[i].innerText === button.innerText) {
            continue;
        }
        else {
            buttons[i].removeAttribute("style")
        }
    }
}