 class Parser {
    parseDate(date) {
        let newDate = date.split("/");
        let month = newDate[0];
        let day = newDate[1];
        newDate[0] = newDate[2];
        newDate[1] = month;
        newDate[2] = day;
        let result = newDate.join('-');
        return result
    }
    parseDateForRange(date) {
        let newDate = date.split("-");
        let year = newDate[0];
        let month = newDate[1];
        let day = newDate[2];
        newDate[0] = year;
        newDate[2] = month;
        newDate[1] = day;
        let result = newDate.join('-');
        return result
    }
    parseDateForBack(date){
        let newDate = date.split(".");
        let year = newDate[2];
        newDate[2] = newDate[0];
        newDate[0] = year;
        return  newDate.join('-');

    }
}

export default new Parser()