<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>javascript</title>
    <style>
        #container {
            width: 70%;
            margin: 0 auto;
            text-align: left;
        }

        #test {
            font-size: 38px;
        }

        #zar {
            padding: 10px 25px;
            font-size: 24px;
            background-color: #3e8e41;
            color: white;
            cursor: pointer;
            border: none;
            float: right;
            position: absolute;
            top: 22px;
            left: 55%;
        }

        #zar:hover {
            background-color: #3e8e41
        }

        #zar:active {
            box-shadow: 0 0px #666;
            transform: translateY(4px);
        }

        .hide {
            cursor: not-allowed;
            pointer-events: none;
        }

        .orange {
            color: orange;
        }

        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
</head>

<body>
    <div id="container">
        <header>
            <h1 id="text">Json & Ajax</h1>
            <button id="zar" Type="button">Press here</button>
            <hr>
        </header>

        <div id="info"></div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        // var car={
        //     "name":"BMW",
        //     "model":"X5",
        // }
        // document.write(car.name);
        // document.write(car['name']);
        // document.write("<h1>"+car.name+"</h1>");

        // var favCar=["Audi","Mercedes"];
        // document.write(favCar[0]);
        // document.write("<h1>"+favCar[0]+"</h1>");

        // xReq.open('POST','');

        // Example #1
        var xReq = new XMLHttpRequest();
        xReq.open('GET', '{{ asset('public/heckt0r.json') }}');
        xReq.onload = function() {
            var xData=xReq.responseText;    //[ { "name":"BMW", "model":"X5" }, { "name":"Audi", "model":"A3" } ]
            var jsonData = JSON.parse(xData);   //[object Object],[object Object]
            var elOne=jsonData[0].name; //BMW
            document.write(xData,"<br> <br> <br>",elOne);
        };
        xReq.send();


        
        // Example #2
        // $.ajax({
        // url: '{{ asset('public/heckt0r.json') }}', // Same URL
        // type: 'GET',
        // dataType: 'json', // Automatically parses JSON
        // success: function(response) {
        //     var elOne = response[0].name; // BMW
        //     document.write(JSON.stringify(response), "<br><br><br>", elOne);
        // },
        // error: function(error) {
        //     console.error("Error fetching JSON:", error);
        // }
    // });


// Example #3
//             $(document).ready(function() {
//                 $('#fetch-data').click(function() {
//                     $.ajax({
//                         url: 'https://jsonplaceholder.typicode.com/posts/1', // Replace with your URL
//                         type: 'GET', // HTTP method
//                         dataType: 'json', // Expected response type
//                         success: function(response) {
//                             // Display the fetched data
//                             $('#result').html(
//                                 `<p><strong>Title:</strong> ${response.title}</p>
//                                 <p><strong>Body:</strong> ${response.body}</p>`
//                             );
//                         },
//                         error: function(xhr, status, error) {
//                             console.error("AJAX Error: ", status, error);
//                             $('#result').html(`<p style="color: red;">Error fetching data.</p>`);
//                         }
//                     });
//                 });
//             });


// Example #4
//     $.ajax({
//         url: 'https://jsonplaceholder.typicode.com/posts',
//         type: 'GET',
//         data: {
//             userId: 1 // Sending a query parameter ?userId=1
//         },
//         success: function(response) {
//             console.log(response);
//         }
//     });


    </script>
</body>

</html>



