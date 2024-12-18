<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>javascript</title>
    <style>
        #container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        #text {
            font-size: 28px;
        }

        #zar {
            display: inline-block;
            padding: 10px 25px;
            margin-bottom: 30px;
            font-size: 24px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            box-shadow: 0 5px #999;
            transition-duration: 0.1s;
        }

        #zar:hover {
            background-color: red;
            /* Green */
            color: white;
        }

        #zar:active {
            background-color: #3e8e41;
            box-shadow: 0 0px #666;
            transform: translateY(4px);
        }

        li {
            list-style-type: none;
            padding: 15px 20px;
            border-bottom: 1px solid #9f9f9f;
        }

        li:hover {
            background-color: #dfdfdf;
            transition-duration: 0.2s;
        }

        .selected {
            background-color: #99ffaa;
        }
    </style>
</head>

<body>
    <div id="container">
        <p id="text">This is new title</p>
        <button id="zar" type="button">Press here</button>

        <ul id="menu">
            <li class="unique">this is first li</li>
            <li class="unique">this is 2nd li</li>
            <li class="unique">this is 3rd li</li>
            <li class="unique">this is 4th li</li>
            <li class="unique">this is 5th li</li>
        </ul>

    </div>

    <script type="text/javascript">
        var btn = document.getElementById('zar');
        var myTitle = document.getElementById('text');
        // var menuItem=document.getElementsByClassName('unique'););
        // var menuItem = document.getElementById('menu').getElementsByTagName('li');
        // ===
        var menuItem = document.querySelectorAll('#menu li');

        // menuItemp[0].innerHTML = 'New Title';
        var myMenu = document.getElementById('menu');
        var counter = 1;

        for (var i = 0; i < menuItem.length; i++) {
            menuItem[i].addEventListener('click', selectItem);
        }


        myMenu.addEventListener("click", selectItem); /////////newwwwwwwwww

        function selectItem(n) {
            if(n.target.nodeName == "LI") {
                myTitle.innerHTML = n.target.innerHTML;
                for (var i = 0; i < menuItem.length; i++) {
                    menuItem[i].classList.remove("selected");
                }
                n.target.classList.add("selected");
            };
        }
        //+++++++++++++++++++++++++++++
        btn.addEventListener('click', newItem);

        function newItem() {
            // myTitle.innerHTML = 'New Title';
            // btn.innerHTML = 'Press the button';
            // menuItem[i].innerHTML='bla bla'

            // myMenu.innerHTML += '<li class="unique">this is 3rd li</li>';
            myMenu.innerHTML += "<li class='unique'>this is 3rd li " + counter + "</li>";
            counter++;

        }






        // document.getElementById('zar').addEventListener('click', function() {
        //     myTitle.innerHTML = 'New Title1';
        // })
    </script>
</body>

</html>
