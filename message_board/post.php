<?php require_once '../session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Co-Connect</title>
        <link rel="stylesheet" href="../style/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/style.css">
    </head>
    <body>

    <div class="menu1 min-100">
        <div class="container ">

            <div class="d-flex flex-row justify-content-between">
                <a href="message-board.php" class="no-deco-link">
                    <i class="fa fa-mail-reply" style="font-size: 30px; color: white;"></i>
                </a>
            </div>
            <div class="card my-2 card-body">
                    <form method="post" action="savePost.php" id="create">
                        <div class="form-group">
                            <label for="title">Titel</label>
                        <input class="form-control" type="text" name="title" placeholder="Title..." id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Omschrijving</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Message..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tagInput">Tags</label>
                            <div class="form-row">
                                <input class="form-control col-2" type="text" name="tagInput" id="tagInput" placeholder="Tag name...">
                                <button class="col-1 btn btn-primary" type="button" id="add_tag">Add tag</button>
                            </div>
                            <div class="form-row">
                                <tagCollection>
                                    <input type="hidden" name="tags" id="currentTags">
                                </tagCollection>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row-md">
                                <div class="col">
                                    <input type="radio" id="positive" name="mood" value="1">
                                    <label for="positive">Positief</label>
                                </div>
                                <div class="col">
                                    <input type="radio" id="negative" name="mood" value="-1">
                                    <label for="negative">Negatief</label>
                                </div>
                                <div class="col">
                                    <input type="radio" id="none" name="mood" value="0">
                                    <label for="none">Neutraal</label>
                                </div>

                            </div>
                            </div>

                        <input type="hidden" name="token" value="<?php
                        if(isset($_SESSION['token'])) {
                            echo $_SESSION['token'];
                        }
                        ?>">

                        <input class="d-flex justify-content-end" type="submit" value="Plaats bericht" id="post">
                    </form>
            </div>

            <div>

            </div>

        </div>
    </div>

    </body>
    <script src="postJs.js"></script>
</html>