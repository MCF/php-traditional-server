<!DOCTYPE html>
<html>
<head>
    <title>php-traditional-server Tests</title>
    <meta charset="utf-8">
    <link href="test.css" rel="stylesheet">
</head>
<body>
    <h1>Fineuploader php-traditional-server Tests</h1>

    <p>
    These are top level tests for the php-traditional-server endpoints.  Each
    test uses Fine Uploader to upload files with different client side
    configurations.  They are provided as a convenience for non-automated
    testing and showing sample configurations.
    </p>

    <h3>Upload Tests</h3>

    <ol>
        <li>
        <p>
        <strong><a href="non-chunked-single-file.php">Non-Chunked Single File</a></strong>
        - returns to this page immediately after successful upload.
        </p>
        </li>
        <li>
        <p>
        <strong><a href="non-chunked-multi-file.php">Non-Chunked Multi-File</a></strong>
        </p>
        </li>
        <li>
        <p>
        <strong><a href="chunked-single-file.php">Chunked Single File</a></strong>
        - returns to this page immediately after successful upload.
        </p>
        </li>
        <li>
        <p>
        <strong><a href="chunked-multi-file.php">Chunked Multi-File</a></strong>
        - allows delete after upload as well.
        </p>
        </li>
    </ol>

    <h3>Uploaded Files</h3>

    <table>
        <tr><th>Name</th><th>Size</th><th>Uploaded On</th></tr>

        <?php
        $my_dir = realpath(dirname(__FILE__));
        $slash = DIRECTORY_SEPARATOR; // Why such a long name PHP?

        // Find all the files uploaded so far.
        $files = glob(implode($slash, array($my_dir, "..","files", "*", "*")));

        // Reverse sort, newest to oldest.
        usort($files, function($a, $b) {return filemtime($b) - filemtime($a);});

        // Convert to paths relative to this PHP script's directory.
        $pattern = '/^' . preg_quote($my_dir . $slash, '/') . '/';
        $files = preg_replace($pattern, '', $files);

        foreach($files as $file): ?>
            <tr>
                <td>
                <a href="<?php echo $file; ?>"><?php echo basename($file) ?></a>
                </td>
                <td><?php echo filesize($file); ?></td>
                <td><?php echo date ("F d Y, H:i:s", filemtime($file)); ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>
