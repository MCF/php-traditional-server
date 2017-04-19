<!DOCTYPE html>
<html>
<head>
    <title>Chunked Multi-File Test</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/file-uploader/5.14.2/fine-uploader-new.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/file-uploader/5.14.2/fine-uploader.js"></script>
    <link href="test.css" rel="stylesheet">
</head>
<body>
    <h1>Chunked Multi-File Test</h1>

    <div id="fine-uploader"></div>

    <p><a href="index.php">Return To Tests Page</a></p>

    <script type="text/template" id="qq-template">
        <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="qq-upload-button-selector qq-upload-button">
                <div>Upload a file</div>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <div class="qq-progress-bar-container-selector">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>
    <script>
        var uploader = new qq.FineUploader({
            // Uncomment for detailed logging in the browser console.
            //debug: true,
            element: document.getElementById('fine-uploader'),
            request: {
                endpoint: '../endpoint.php'
            },
            retry: {
               enableAuto: true,
               showButton: true
            },
            chunking: {
                enabled: true,
                // post_max_size and upload_max_filesize must be set to the
                // value of partSize or larger.  They can only be set in
                // PHP.ini or an .htaccess file.  If not set their defaults are
                // 8 MB and 2 MB respectively which should be fine given our
                // choice of a small chunk size here.
                partSize: (50*1000),        // 50 KB.
                concurrent: {
                    enabled: true
                },
                success: {
                    endpoint: '../endpoint.php?done'
                }
            },
            multiple: true,
            validation: {
                sizeLimit: (20*1000*1000)   // 20 MB
            },
            deleteFile: {
                enabled: true,
                endpoint: '../endpoint.php'
            }
        });
    </script>
</body>
</html>
