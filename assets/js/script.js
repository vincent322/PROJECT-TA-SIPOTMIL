// mengambil elemen
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// menambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function () {


    // buat object ajax
    var xhr = new XMLHttpRequest();

    // CEK KONDISI AJAX
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax
    xhr.open('GET', 'ajax/data_berkas.php?keyword=' + keyword.value, true);
    xhr.send();


});
