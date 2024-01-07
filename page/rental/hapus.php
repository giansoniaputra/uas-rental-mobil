<?php
rental_destroy($_GET['no_trx']);
echo "
        <script>
            document.location.href = '?page=rental&pesan=Data Berhasil Dihapus!';
        </script>
        ";
