


// ambil data yg diperlukan dari index berdasarkan id tadi mengunakan penelusuran dom

var keyword = document.getElementById('keyword');

var tombolcari = document.getElementById('tombol-cari');

var container = document.getElementById('container');

// tombolcari.addEventListener('click', function() {
//     alert('berhasil')
// });

// tambahkan event ketika keyword ditulis
// keyword.addEventListener('keyup', function() {
//     alert('ok')
// })

// keyword.addEventListener('keyup', function(){
//     console.log(keyword.value)
// })



    // buat object ajax

keyword.addEventListener('keyup', function(){
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
           container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value , true);
    xhr.send();
});