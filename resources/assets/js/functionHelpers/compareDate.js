import splitDate from './splitDate'

export default function compareDates(firstDate, secondDate) {

    let first = splitDate(firstDate);
    let second = splitDate(secondDate);
    return (first <= second) ? 1 : -1
}
