<?php
include "db.php";
if (! isset($_SESSION["id"])) {
    header("Location:login.php");
}
$user_id=$_SESSION["id"];
$result=$conn->query("SELECT blogs.*,uname from blogs join user on blogs.user_id=user.id");
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body class="bg-secondary">
        <header>
            <!-- place navbar here -->
        </header>
        <main>
        <div
            class="container text-center my-4 "
        >
        <h3 class="text-center my-4">Dashboard</h3>
            <a
                name=""
                id=""
                class="btn btn-info"
                href="addblog.php"
                role="button"
                >Add Blog</a
            >
            <a
                name=""
                id=""
                class="btn btn-danger"
                href="logout.php"
                role="button"
                >Logout</a
            >
            

        <div
            class="container text-center col-6 my-5"
        >
            <?php while($row=$result->fetch_assoc()){?>
                <div class="card my-3">
                    <img class="card-img" src="uploads/<?= $row["image"]?>" alt="Title" />
                    <div class="card-body">
                        <small>BY: <?=$row["uname"] ?>| <?=$row["date"]?></small>
                        <h4 class="card-title"><?= $row["title"]?></h4>
                        <p class="card-text"><?= $row["content"]?></p>
                    </div>
                    <?php if($_SESSION["id"]==$row["user_id"]){ ?>
                        <div
                            class="container my-4"
                        >
                        
                        <a
                            name=""
                            id=""
                            class="btn btn-warning"
                            href="edit.php?blog_id=<?= $row['blog_id']?>"
                            role="button"
                            >Edit</a
                        >
                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="delete.php?blog_id=<?= $row['blog_id']?>"
                            role="button"
                            onclick="return confirm('Are You sure you want to delete?');"
                            >Delete</a
                        >
                        </div>  
                    <?php } ?>
                    
                </div>
            <?php } ?>    
        </div>
        </div>
        
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>