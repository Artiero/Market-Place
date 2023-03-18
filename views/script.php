<script src="asset/bootstrap/js/bootstrap.min.js"></script>
<script src="asset/aos/js/aos.js"></script>

<script src="assets-cms/js/sweetalert.min.js"></script>

<script>
        let a = 1;
        const sub_total = document.getElementById("subTotal");
        function rubah(angka){
            let reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }
        function inc(){
            let jumlah = document.getElementById("jumlah");
            jumlah.value=a;
            a++;
            jumlah.value=a;
            let angka = a*15000;
            sub_total.innerHTML = "Rp. "+rubah(angka)+"/ "+a+" Kg";
        }
        function dec(){
            let jumlah = document.getElementById("jumlah");
            jumlah.value=a;
            if(a >= 1){
                a--;
            }
            jumlah.value=a;
            let angka = a*15000;
            sub_total.innerHTML = "Rp. "+rubah(angka)+"/ "+a+" Kg";
        }
    </script>