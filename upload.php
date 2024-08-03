<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$s3 = new S3Client([
    'version' => 'latest',
    'region' => 'us-east-2',
    'credentials' => [
        'key' => $_ENV['AWS_ACCESS_KEY_ID'],
        'secret' => $_ENV['AWS_SECRET_ACCESS_KEY']
    ]
]);

$status = '';
$option = '';

if (isset($_POST['submit'])) {
    $name = $_FILES['imagens']['name'];
    $tmp_name = $_FILES['imagens']['tmp_name'];

    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $newName = uniqid() . '.' . $extension;

    try {
        $s3->putObject([
            'Bucket' => $_ENV['S3_BUCKET'],
            'Key' => $newName,
            'ACL' => 'public-read',
            'SourceFile' => $tmp_name
        ]);
        $status = 'Upload realizado com sucesso!';
        $option = 'success';
        $link = $s3->getObjectUrl($_ENV['S3_BUCKET'], $newName);
    } catch (AwsException $e) {
        $status = 'Erro ao realizar upload';
        $option = 'danger';
    } catch (Exception $e) {
        $status = 'Erro inesperado';
        $option = 'danger';
    }
}
