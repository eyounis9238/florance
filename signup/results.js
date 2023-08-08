function httpGetAsync(url, callback) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            callback(xmlHttp.responseText);
        }
    }
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

window.onload = function() {

    var callback = function(response) {
        data = JSON.parse(response);

        var elem = document.getElementById('query');
        elem.textContent = '';

        var headers = ['name', 'email', 'phone'];

        for (var i = 0; i < data.length; i++) {

            var tr = document.createElement('tr');

            for (var j = 0; j < headers.length; j++) {

                var td = document.createElement('td');
                var text = document.createTextNode(data[i][headers[j]]);

                td.appendChild(text);
                tr.appendChild(td);
            }

            elem.appendChild(tr);
        }
    }

    var sortButtons = document.getElementsByClassName('querySort');
    console.log(sortButtons.length);

    for (var i = 0; i < sortButtons.length; i++) {
        sortButtons[i].onclick = function() {

            var sort = this.text;
            console.log(sort);

            var url = 'http://localhost:8080/php/unit8/activityFinal/query.php?q=' + sort;
            console.log(url);
            httpGetAsync(url, callback);
        }
    }
}
