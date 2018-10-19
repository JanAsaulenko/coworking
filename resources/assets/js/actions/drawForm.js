export default function drawFunction(range) {
    let block_with_form = $('.block_with_form');
    if (block_with_form.is(':visible')) return;
    block_with_form.css({
        'display': 'flex',
        'flex-direction': 'column',
        'position': 'relative',
        "top": '14px'
    });
    /*TODO  if you want to add logic  " How much days user reserved you can make it here"*/
};