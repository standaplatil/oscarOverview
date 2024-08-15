<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Přehled Oscarů</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Přehled Oscarů</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="femaleFile" class="form-label">Nahrát CSV soubor (Ženy)</label>
                <input class="form-control" type="file" id="femaleFile" name="femaleFile" required>
            </div>
            <div class="mb-3">
                <label for="maleFile" class="form-label">Nahrát CSV soubor (Muži)</label>
                <input class="form-control" type="file" id="maleFile" name="maleFile" required>
            </div>
            <button type="submit" class="btn btn-primary">Nahrát</button>
        </form>
    </div>
</body>
</html>
