function filter() {

    var form = document.getElementById('myForm');
    url = form.getAttribute('action');

    select1 = document.getElementById('select1').value;
    select2 = document.getElementById('select2').value;
    select3 = document.getElementById('select3').value;

    var data = new FormData();
    data.append('modelName', select1);
    data.append('technologyName', select2);
    data.append('brandName', select3);

    var http = new XMLHttpRequest();

    http.open('POST', url, true);
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            var template = document.createElement('template');
            template.innerHTML = this.responseText;
            var data = template.content.querySelector('#table-data');
            if (data) {
                var lightbox = document.getElementById('table-data');
                lightbox.innerHTML = data.innerHTML;
            }
            else {
                var lightbox = document.getElementById('table-data');
                console.log(lightbox);
                lightbox.innerHTML = "<h2 class='text-center'>No data Found<h2>";
            }
        }
    }
    http.send(data);
}

var form = document.getElementById('filter');
form.addEventListener('click', filter);


function jsPagination(data, model, technology, brandName) {
    id = "page" + data;
    url = document.getElementById(id).getAttribute('atr');

    console.log(url);
    var data = new FormData();
    data.append('modelName', model);
    data.append('technologyName', technology);
    data.append('brandName', brandName);

    var http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {

            var template = document.createElement('template');
            template.innerHTML = this.responseText;
            var data = template.content.querySelector('#table-data');
            if (data) {
                var lightbox = document.getElementById('table-data');
                lightbox.innerHTML = data.innerHTML;
            }
            else {
                var lightbox = document.getElementById('table-data');
                console.log(lightbox);
                lightbox.innerHTML = "<h2 class='text-center'>No data Found<h2>";
            }
        }
    }
    http.send(data);

}
