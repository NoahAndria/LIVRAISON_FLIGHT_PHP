## how to get the values of post request from a form in flight_php

the route looks like this: 

        $router->post('/addhandler', [ApiExampleController::class, 'add' ]);

then in the function you get the value by doing this:

        $req = Flight::request();
        $nom = $req->data->nom;

## how to declare attributes of a php class (in flight)

-> just like in java, but the String is in all lowercase

## how to upload a file (preferrably an image) and save it locally (just in a different folder, of the project) in php (from a form)

**Frontend**

- the form must have an attribute `enctype="mulitpart/form-data"`
- the input's type is `file`

**Handling it**

just gonna paste this here first

    Flight::route('POST /upload', function() {
        $req = Flight::request();
        $file = $req->files['image'];

        // 1. Check if file is received
        if ($file['error'] !== UPLOAD_ERR_OK) {
            Flight::halt(400, "Upload error");
        }

        // 2. Define upload directory
        $uploadDir = __DIR__ . "/uploads/";

        // Make directory if not exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // 3. Build a safe filename
        $filename = uniqid() . "-" . basename($file['name']);
        $destination = $uploadDir . $filename;

        // 4. Move file
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            echo "File uploaded successfully! Saved as: $filename";
        } else {
            Flight::halt(500, "Failed to save file");
        }
    });

## how to call a function with multiple parameters using $router->post