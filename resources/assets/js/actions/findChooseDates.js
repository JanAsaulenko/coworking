import Draw from './drawFormList';
export default function findChooseDate(date ) {
    const blockForImplement = $('.block_with_form-db_info');
       Draw.drawFormList(date, blockForImplement)
}
