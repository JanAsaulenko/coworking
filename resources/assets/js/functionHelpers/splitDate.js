export default function splitDate(date) {
    let arr = date.split(/-|\./g); // ass Andre about it
    return  arr.join('');
}