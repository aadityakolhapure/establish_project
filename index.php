<?php include('includes/config.php');?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendors/styles/home copy.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: poppins;
        }

        header {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            background-color: rgb(21, 21, 100);
            color: white;
            padding: 20px 0;
        }

        header nav a {
            color: white;
            margin-right: 30px;
            font-weight: 500;
        }

        header div.sign-in-up button {
            background-color: #75cfb8;
            font-size: 16px;
            font-weight: 550;
            padding: 4px 12px;
            border: 2px solid #000;
            border-radius: 5px;
            outline: none;
            margin-left: 20px;
        }

        header div.sign-in-up button:last-child {
            background-color: rgba(17, 20, 104, 0.45);
        }

        div.popup-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            display: none;
        }

        div.popup-container div.popup {
            background-color: #f0f0f0;
            width: 350px;
            border-radius: 5px;
            padding: 20px 25px 30px 25px;
        }

        div.popup-container div.popup h2 {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            color: rgb(21, 21, 100);
        }

        div.popup-container div.popup h2 button {
            border: none;
            background-color: transparent;
            outline: none;
            font-size: 18px;
            font-weight: 550;
            color: #797775;
        }

        div.popup-container div.popup input {
            width: 100%;
            margin-bottom: 20px;
            background-color: transparent;
            border: none;
            border-bottom: 2px solid rgb(21, 21, 100);
            border-radius: 0;
            padding: 5px 0;
            font-weight: 550;
            font-size: 14px;
            outline: none;
        }

        div.popup-container div.popup button.login-btn,
        div.popup-container div.register button.register-btn {
            font-weight: 550;
            font-style: 15px;
            color: white;
            background-color: rgb(21, 21, 100);
            padding: 4px 10px;
            border: none;
            outline: none;
            margin-top: 5px;
        }

        .forget-btn {
            text-align: right;
        }

        div.popup-container div.popup div.forget-btn button {
            border: none;
            background-color: transparent;
            outline: none;
            font-weight: 450;
            cursor: pointer;
        }

        div.popup-container div.register {
            background-color: #edeef7;
        }

        div.popup-container div.register h2 {
            color: rgb(21, 21, 100);
        }

        div.popup-container div.register input {
            border-bottom-color: rgb(21, 21, 100);
        }

        div.popup-container div.register button.register-btn {
            background-color: rgb(21, 21, 100);
        }

        div.user {
            color: rgb(21, 21, 100);
            background-color: #75cfb8;
            padding: 5px 15px;
            border-radius: 5px;
            font-weight: 500;
        }

        div.user a {
            color: rgb(21, 21, 100);
        }

        button {
            padding-bottom: 6px;
            padding-top: 6px;
            padding-right: 4px;
            padding-left: 37px;
            color: rgb(21, 21, 100);
            background: #ffffff05;
            /* border: burlywood; */
            border: none;
            font-size: 0.9rem;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <nav>
        <div class="navigation">
            <ul>
                <i id="menu-close" class="fas fa-times"></i>
                <button type='button' onclick="popup('about-popup')"><span style="font-size: x-large;
                        color: rgb(255 255 255);">About Us</span></button>
                <button type='button' onclick="popup('instru-popup')"><span style="font-size: x-large;
                    color: rgb(255 255 255);">Instruction</span></button>
            </ul>
            <img id="menu-btn" src="vendors/images/menu.png" alt="">
        </div>
    </nav>

    <!-- login/register -->
    <div class="popup-container" id="about-popup">
        <div class="popup">
            <h2>
                <span style="font-size: 25px; color:rgb(21 21 100)">About Us</span>
                <button type="reset" onclick="popup('about-popup')">X</button>
            </h2>
            <span style="color: #000;">
                Establishment Section software aim for providing a comprehensive, user friendly platform that automates administrative task by paperless mode. <br>
                The work of this software is to <br>
                1. Manage staff details and their documents. <br>
                2. Manage leave of staff also approve or not approve the staff leave application. <br>
                3. Then this software offer approval system for HOD and administrative. <br>
                4. The Principal, administrative and HOD can view the staff details and staff leave history. <br>
                5. The Hod of a particular department can only see the details of staff of his/her own department . <br>

            </span>
        </div>
    </div>
    <div class="popup-container" id="instru-popup">
        <div class="popup">
            <h2>
                <span style="font-size: 25px; color:rgb(21 21 100)">Instruction</span>
                <button type="reset" onclick="popup('instru-popup')">X</button>
            </h2>
            <span>

            </span>
        </div>
    </div>
    <script>
        function popup(popup_name) {
            get_popup = document.getElementById(popup_name);
            if (get_popup.style.display == "flex") {
                get_popup.style.display = "none";
            } else {
                get_popup.style.display = "flex";
            }
        }
    </script>


    <section id="home">
        <h2>Establishment Section</h2>
        <!-- <p>Education is the key to unlocking the potential of individuals and societies. It empowers people with the
            knowledge and skills they need to reach their full potential and contribute to the world around them.
            Education is not just about acquiring knowledge, but also about learning how to learn, think critically, and
            solve problems. It is a lifelong journey that begins in childhood and continues throughout our lives.</p> -->
        <div class="btn">
            <a class="blue" href="https://www.dnyanshree.edu.in">Visit us</a>
            <a class="yellow" href="login.php">Login</a>
        </div>
    </section>


    <script>
        $('#menu-btn').click(function () {
            $('nav .navigation ul').addClass('active')
        });
        $('#menu-close').click(function () {
            $('nav .navigation ul').removeClass('active')
        });
    </script>



</body>

</html>