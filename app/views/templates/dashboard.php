<?
if (!isset($_SESSION['user']['is_login'])) {
    header('Location: http://localhost/pemweb/public/login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<? echo BASEURL; ?>/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/bootstrap.css">
    <link rel="icon" type="image/x-icon" href="<? echo BASEURL; ?>/img/favicon.ico">
    <title><? echo $data['judul'] ?></title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

        :root {
            --header-height: 3rem;
            --nav-width: 68px;
            --first-color: #0A6EAF;
            --first-color-light: #B9D5E8;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box
        }

        body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s
        }

        a {
            text-decoration: none
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s
        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer
        }

        .header_img {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden
        }

        .header_img img {
            width: 40px
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed)
        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden
        }

        .nav_logo,
        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem
        }

        .nav_logo {
            margin-bottom: 2rem
        }

        .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color)
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700
        }

        .nav_link {
            position: relative;
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s
        }

        .nav_link:hover {
            color: var(--white-color)
        }

        .nav_icon {
            font-size: 1.25rem
        }

        .show {
            left: 0
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem)
        }

        .active {
            color: var(--white-color)
        }

        .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: var(--white-color)
        }

        .height-100 {
            height: 100vh
        }

        @media screen and (min-width: 768px) {
            body {
                margin: calc(var(--header-height) + 1rem) 0 0 0;
                padding-left: calc(var(--nav-width) + 2rem)
            }

            .header {
                height: calc(var(--header-height) + 1rem);
                padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
            }

            .header_img {
                width: 40px;
                height: 40px
            }

            .header_img img {
                width: 45px
            }

            .l-navbar {
                left: 0;
                padding: 1rem 1rem 0 0
            }

            .show {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
        }
    </style>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        nav.classList.toggle('show')
                        toggle.classList.toggle('bx-x')
                        bodypd.classList.toggle('body-pd')
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                // if (linkColor) {
                //     console.log(linkColor);
                //     linkColor.forEach(l => l.classList.remove('active'))
                //     this.classList.add('active')
                // }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

        });
    </script>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div style="display: flex; align-items: center;">
            <strong style="margin-right: 12px;">
                Welcome, <? echo $_SESSION['user']['data']['user_name']; ?>
            </strong>
            <div class="header_img">
                <img src="<?php echo BASEURL; ?>/img/user.png" alt="">
            </div>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a id="logo_header" class="nav_logo">
                    <img src="<?php echo BASEURL; ?>/img/logo_umb_white.webp" alt="" width="20">
                    <span class="nav_logo-name">Admin Dashboard</span>
                </a>
                <div class="nav_list">
                    <a href="<? echo BASEURL; ?>/dashboard?page=main" id="dashboard" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="<? echo BASEURL; ?>/dashboard?page=mahasiswa" id="mahasiswa" class="nav_link"> <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Mahasiswa</span> </a>
                    <a href="<? echo BASEURL; ?>/dashboard?page=semester" id="semester" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i>
                        <span class="nav_name">Semester</span>
                    </a>
                    <a href="<? echo BASEURL; ?>/dashboard?page=program-studi" class="nav_link"> <i class='bx bx-folder nav_icon'></i>
                        <span class="nav_name">Program Studi</span>
                    </a>
                    <a href="<? echo BASEURL; ?>/dashboard?page=transaksi" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">Transaksi</span> </a>
                </div>
            </div> <a href="<? echo BASEURL; ?>/logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Keluar</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div id="content">

    </div>
    <!--Container Main end-->
</body>

<script>
    $(document).ready(function() {
        $('.nav_link').each(function() {
            if (window.location.href.indexOf($(this).prop('href')) != -1) {
                $(this).addClass('active');
            }
        });
    });

    //function that loads content
    function loadContent(content) {
        $.ajax({
            type: 'post',
            url: content,
            success: function(res) {
                var el = document.createElement('div');
                el.innerHTML = res;
                $('#content').empty()
                $('#content').prepend(el);
            }
        })
    };
</script>

</html>