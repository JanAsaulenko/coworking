export default  function parseDate(date) {
    let newDate = date.split("/");
    let month = newDate[0];
    let day = newDate[1];
    newDate[0] = newDate[2];
    newDate[1] = month;
    newDate[2] = day;
    let result = newDate.join('-');
    return result
}