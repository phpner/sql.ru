/*
window.onload = function (ev) {

    var form = document.forms[0];

    form.addEventListener('submit',function (evnt) {
        evnt.preventDefault();

        function isCheck(name) {
            var res = document.querySelector('input[name="tables"]:checked');
            var inner = document.getElementById('inner');
            if (res == null){

                inner.innerHTML = '<h1>Выберите таблицу для выборки !</h1>';
            }else {
                inner.innerHTML = '';
                sendData(res);
            }
        }
        // пример использования:

        isCheck();
    })

    function sendData(date){
        var form = document.forms[0];
        var formD  =  new FormData(form);
        var res = document.querySelector('input[name="tables"]:checked');

        var xml = new XMLHttpRequest();

        var d = "gu="+ res.value +""

        xml.open('POST','user');

        xml.send();

        xml.onreadystatechange = function (ev2) {

            if (xml.readyState != 4 ) return ;

            if (xml.status =! 200){
                alert(xml.status + ': ' + xml.statusText);
            }else{
                alert(xml.responseText);
            }
        }
    }

}
*/
