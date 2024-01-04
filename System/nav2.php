<header class="fixed-top header">
    <div class="navigation w-100">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <a class="navbar-brand" href="../Mentor/home_mentor.php"><img src="../Bootstrap/images/img/logo minteryuk.png" alt="logo" style="width:6vw;"></a>
                <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto text-center">
                        <li class="nav-item active" id="n1">
                            <a class="nav-link" href="../Mentor/home_mentor.php" style='margin-top:1vh;'>Home</a>
                        </li>
                        <li class="nav-item @@about"id="n2">
                            <a class="nav-link" href="../General/about.php" style='margin-top:1vh;'>About Us</a>
                        </li>
                        <!-- <li class="nav-item @@courses">
                            <a class="nav-link" href="../Mentor/class_customer.php" style='margin-top:1vh;'>MyClass</a>
                        </li>-->
                        <li class="nav-item dropdown"id="n3"style='margin-top:1vh;'>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Class</a>
                            <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown" style="width:auto">
                                <a class="dropdown-item" href="../Mentor/makeclass_mentor.php">Make Class</a>
                                <a class="dropdown-item" href="../Mentor/materi_mentor.php">Material</a>
                            </div>
                        </li> 
                        <li class="nav-item @@courses"id="n4">
                            <a class="nav-link" href="../Mentor/forum_mentor.php" style='margin-top:1vh;'>Forum</a>
                        </li>
                        <li class="nav-item @@contact"id="n5">
                            <a class="nav-link" href="../General/contact.php" style='margin-top:1vh;'>Contact</a>
                        </li>
                        <li class="nav-item"id="n6">
                            <a href="../Mentor/transaction_mentor.php"><i class='fas fa-money-check-alt' style='margin-top:6vh;font-size:30px;color:white'></i></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width:auto">
                                <a class="dropdown-item" href="../Mentor/profile_mentor.php">Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../login.php">Logout</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
