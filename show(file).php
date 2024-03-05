<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.png">

    <title>Stored Informations Display</title>
    <style>
        body {
            background-color: black;
            color: white;
        }

        pre {
            background-color: transparent;
            border: 1px solid #ccc;
            color: white;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 10px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
            overflow: auto; /* Add overflow for long content */
        }

        pre:focus {
            border-color: #007bff;
            background-color: transparent; /* Set background color to transparent when focused */
            outline: none;
        }
    </style>
</head>
<body>
    <h2>All informations...<hr></h2>
    <?php
    // Read the content of the file
    $file_name = "store_info.txt";
    $file_content = file_get_contents($file_name);

    // Display the content if the file exists
    if ($file_content !== false) {
        // Replace newline characters with HTML line breaks for display
        $file_content = nl2br($file_content);
        echo "<pre>$file_content</pre>";
    } else {
        echo "Error: Unable to read the file.";
    }
    ?>
</body>
</html>