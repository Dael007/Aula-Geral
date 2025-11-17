<?php
$arquivo = $_GET['file'];

if (file_exists($arquivo)) {
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($arquivo) . '"');
    header('Content-Length: ' . filesize($arquivo));
    readfile($arquivo);
    exit;
}

echo "Arquivo não encontrado.";
