<!DOCTYPE html>
<html>
    <head>
        <title>Server Error</title>
        <link rel="stylesheet" type="text/css" href="/uikit/css/uikit.min.css" />
        <script src="/uikit/js/uikit.min.js"></script>
    </head>
    <body>
        <div class="uk-container uk-container-expand uk-padding">
            <div class="uk-alert uk-alert-danger">
                <h3>Error occurred (500)</h3>
                <p>Please check your code or contact your system administrator.</p>
                <p class="uk-text-muted"><?php echo $message; ?></p>
            </div>
        </div>
    </body>
</html>