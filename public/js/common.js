const nl2br = (str) => {
    var res = str.replace(/\r\n/g, "<br>");
    res = res.replace(/(\n|\r)/g, "<br>");
    return res;
}

//今日の日時を表示
window.onload = function () {
    //今日の日時を表示
    var date = new Date()
    var year = date.getFullYear()
    var month = date.getMonth() + 1
    var day = date.getDate()

    var toTwoDigits = function (num, digit) {
        num += ''
        if (num.length < digit) {
            num = '0' + num
        }
        return num
    }

    var yyyy = toTwoDigits(year, 4)
    var mm = toTwoDigits(month, 2)
    var dd = toTwoDigits(day, 2)
    var ymd = yyyy + "-" + mm + "-" + dd;

    document.getElementById("today").value = ymd;
}

function keisan (count) {
    var number = document.getElementById("quantity" + count).value;
    var price = document.getElementById("price" + count).value;
    var total_price = Number(number) * Number(price);
    // alert(total_price);
    document.getElementById("field" + count).value = total_price;
    var ele = document.getElementsByClassName("count_price");
    // alert(ele.length);
    var sum_total_price = 0;
    for(var i = 0; i < ele.length; i++ ) {
        var sum_number = Number(document.getElementById("quantity" + i).value);
        if (sum_number > 0) {
            var sum_price = Number(document.getElementById("price" + i).value);
            sum_total_price += sum_number * sum_price;
        }
    }
    document.getElementById("sum_total_price").value = sum_total_price;


}

