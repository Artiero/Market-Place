<script src="asset/bootstrap/js/bootstrap.min.js"></script>
<script src="asset/aos/js/aos.js"></script>

<script src="assets-cms/js/sweetalert.min.js"></script>

<script>
    var harga_produk = '<?= $resultNama['harga_produk'] ?>'
    var stock_produk = '<?= $resultNama['jumlah_produk'] ?>'
    var satuan_produk = '<?= $resultNama['satuan_produk'] ?>'
    let a = 0;
    const sub_total = document.getElementById("subTotal");
    const jumlah = document.getElementById("jumlah");

    function rubah(angka) {
        let reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }

    function getJumlah(val) {
        if (val > stock_produk) {
            let angka = stock_produk * harga_produk;
            sub_total.innerHTML = "Rp. " + rubah(angka) + "/ " + a + " "+satuan_produk;
            jumlah.value = stock_produk
        } else {
            let angka = val * harga_produk;
            sub_total.innerHTML = "Rp. " + rubah(angka) + "/ " + a + " "+satuan_produk;
        }
    }

    function inc() {
        let jumlah = document.getElementById("jumlah");
        jumlah.value = a;
        if (a < stock_produk) {
            a++;
        }
        jumlah.value = a;
        let angka = a * harga_produk;
        sub_total.innerHTML = "Rp. " + rubah(angka) + "/ " + a + " "+satuan_produk;
    }

    function dec() {
        let jumlah = document.getElementById("jumlah");
        jumlah.value = a;
        if (a >= 1) {
            a--;
        }
        jumlah.value = a;
        let angka = a * harga_produk;
        sub_total.innerHTML = "Rp. " + rubah(angka) + "/ " + a + " "+satuan_produk;
    }
</script>