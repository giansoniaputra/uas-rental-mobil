<?php
mobil_destroy($_GET['no_plat']);
echo "
        <script>
            document.location.href = '?page=mobil&pesan=Data Berhasil Dihapus!';
        </script>
        ";
