<?php
/**
 * s3upload.php
 * -----------------------------------------------------------------
 * Runs on EC2. Accepts a file upload from index.html and pushes it
 * to an S3 bucket using the AWS SDK for PHP.
 *
 * Setup (run once on the EC2 instance):
 *   composer require aws/aws-sdk-php
 *
 * IAM: Attach an IAM Role to the EC2 instance with permission to
 * PutObject into the target bucket. Do NOT hardcode access keys.
 * -----------------------------------------------------------------
 */

require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// ---- CONFIG -----------------------------------------------------
$bucket = "your-student-upload-bucket";   // <-- change this
$region = "us-east-1";                    // <-- change this to your region
// ------------------------------------------------------------------

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileToUpload'])) {

    $file = $_FILES['fileToUpload'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("<p style='color:red'>Upload error code: " . $file['error'] . "</p>");
    }

    $tmpPath   = $file['tmp_name'];
    $fileName  = basename($file['name']);
    $fileSize  = $file['size'];
    $fileType  = mime_content_type($tmpPath);

    // Uses the EC2 instance's attached IAM Role automatically —
    // no access key / secret key needed in code.
    $s3Client = new S3Client([
        'version' => 'latest',
        'region'  => $region,
    ]);

    try {
        $result = $s3Client->putObject([
            'Bucket'      => $bucket,
            'Key'         => $fileName,
            'SourceFile'  => $tmpPath,
            'ContentType' => $fileType,
            // Custom metadata — Lambda can read these via the
            // GetObject / HeadObject response.
            'Metadata' => [
                'uploaded-by'   => 'student-ec2-app',
                'original-name' => $fileName,
                'upload-time'   => date('c'),
            ],
        ]);

        echo "<div style='font-family:Arial;max-width:600px;margin:60px auto;'>";
        echo "<h3 style='color:green'>Upload successful!</h3>";
        echo "<p><strong>File:</strong> " . htmlspecialchars($fileName) . "</p>";
        echo "<p><strong>Size:</strong> " . round($fileSize / 1024, 2) . " KB</p>";
        echo "<p><strong>S3 URL:</strong> " . htmlspecialchars($result['ObjectURL']) . "</p>";
        echo "<p>An email notification will be sent shortly via SNS once Lambda processes the metadata.</p>";
        echo "<a href='index.html'>Upload another file</a>";
        echo "</div>";

    } catch (AwsException $e) {
        echo "<p style='color:red'>Error uploading to S3: " . htmlspecialchars($e->getMessage()) . "</p>";
    }

} else {
    header("Location: index.html");
    exit;
}
