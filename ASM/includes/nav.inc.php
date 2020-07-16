<?php
if (isset($_POST['logout'])) {
    setcookie("UserName");
    header('Location: login.php');
}
?>

<div class="container sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <a class="navbar-brand" href="../ASM">Hiếu iceTea (ASM)</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../ASM">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../ASM">Product</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Store</a>
                </li>

            </ul>

            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    User
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../ASM/admin_view.php">Dashboard</a>
                    <a class="dropdown-item" href="../ASM/admin_view.php">Administration</a>
                    <div class="dropdown-divider"></div>

                    <form method="post">
                        <button type="submit" id="logout" name="logout" class="btn dropdown-item">Log out</button>
                    </form>
                </div>
            </div>

            <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                <label class="btn btn-outline-info btn-sm active">
                    <input type="radio" name="options" id="option1" checked> EN
                </label>
                <label class="btn btn-outline-info btn-sm">
                    <input type="radio" name="options" id="option2"> VN
                </label>
            </div>

        </div>
    </nav>
</div>
