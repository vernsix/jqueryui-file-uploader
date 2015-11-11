<?php
/*

    Copyright (c) 2007-2015 by Vernon E. Six, Jr.
    Author's websites: http://www.ipinga.com and http://www.VernSix.com

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to use
    the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice, author's websites and this permission notice
    shall be included in all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
    FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
    IN THE SOFTWARE.
*/

//Upload Directory, ends with slash
$uploadDirectory = 'uploads/';

if (!isset($_FILES['file1'])) {
    die("File is empty!");
}

if ($_FILES['file1']['error']) {
    die(upload_errors($_FILES['file1']['error']));
}

//uploaded file name, extension, type, size and a random number
$filename = strtolower($_FILES['file1']['name']);
$fileBase = substr($filename, 0, strrpos($filename, '.'));
$fileExt = substr($filename, strrpos($filename, '.'));
$fileType = $_FILES['file1']['type'];
$fileSize = $_FILES['file1']["size"];
$randomNumber = rand(0, 9999999999);

switch (strtolower($fileType)) {
    //allowed file types
    case 'image/png':
    case 'image/gif':
    case 'image/jpeg':
    case 'application/pdf':
    case 'application/msword':
    case 'application/vnd.ms-excel':
    case 'application/x-zip-compressed':
    case 'text/plain':
    case 'text/html':
    case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
        break;
    default:
        die('Unsupported File Type!');
}

$newFilename = $fileBase . '_' . $randomNumber . $fileExt;

if (move_uploaded_file($_FILES['file1']["tmp_name"], $uploadDirectory . $newFilename)) {
    die( $filename . ' Uploaded Successfully as '. $uploadDirectory. $newFilename );
} else {
    die('Error moving file from temp location ('. $_FILES['file1']["tmp_name"].') to its final home ('. $uploadDirectory . $newFilename  .')' );
}

function upload_errors($err_code)
{
    switch ($err_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}

?>
