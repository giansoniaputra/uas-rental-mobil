<?php
pelanggan_destroy($_GET['no_pelanggan']);
echo "
        <script>
            document.location.href = '?page=pelanggan&pesan=Data Berhasil Dihapus!';
        </script>
        ";
