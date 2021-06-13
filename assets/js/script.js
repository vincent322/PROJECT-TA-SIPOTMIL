// mengambil elemen
var keyword = document.getElementById('keyword');
var search = document.getElementById('search');

// menambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function () {


    // buat object ajax
    var xhr = new XMLHttpRequest();

    // CEK KONDISI AJAX
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            search.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax
    xhr.open('GET', 'ajax/data_berkas_atasan.php?keyword=' + keyword.value, true);
    xhr.send();


});

// mengambil elemen
var keyword = document.getElementById('keyword');
var search = document.getElementById('search');

// menambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function () {


    // buat object ajax
    var xhr = new XMLHttpRequest();

    // CEK KONDISI AJAX
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            search.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax
    xhr.open('GET', 'ajax/data_berkas_penyidik.php?keyword=' + keyword.value, true);
    xhr.send();


});

// mengambil elemen
var keyword = document.getElementById('keyword');
var search = document.getElementById('search');

// menambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function () {


    // buat object ajax
    var xhr = new XMLHttpRequest();

    // CEK KONDISI AJAX
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            search.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax
    xhr.open('GET', 'ajax/data_berkas_taud.php?keyword=' + keyword.value, true);
    xhr.send();


});

// mengambil elemen
var keyword = document.getElementById('keyword');
var search = document.getElementById('search');

// menambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function () {


    // buat object ajax
    var xhr = new XMLHttpRequest();

    // CEK KONDISI AJAX
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            search.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax
    xhr.open('GET', 'ajax/data_berkas_oditur.php?keyword=' + keyword.value, true);
    xhr.send();


});

