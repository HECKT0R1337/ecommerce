<script>
    // Example #1 with XMLHttpRequest to fetch JSON data from a URL and display it in the console log using document.write():
    var xReq = new XMLHttpRequest();
    xReq.open('GET', '{{ asset("public/heckt0r.json") }}');
    xReq.onload = function() {
        var xData = xReq.responseText; //[ { "name":"BMW", "model":"X5" }, { "name":"Audi", "model":"A3" } ]
        var jsonData = JSON.parse(xData); //[object Object],[object Object]
        var elOne = jsonData[0].name; //BMW
        document.write(xData, "<br> <br> <br>", elOne);
    };
    xReq.send();

    // /////////////////////////////////////////////////////////////////////////////////////////////////
    // Example #2 with jquery ajax request using $.ajax() method to fetch JSON data from a URL and display it in the console log using document.write(): .
    $.ajax({
        url: '{{ asset("public/heckt0r.json") }}', // Same URL
        type: 'GET',
        dataType: 'json', // Automatically parses JSON
        success: function(response) {
            var elOne = response[0].name; // BMW
            document.write(JSON.stringify(response), "<br><br><br>", elOne);
        },
        error: function(error) {
            console.error("Error fetching JSON:", error);
        }
    });
    // /////////////////////////////////////////////////////////////////////////////////////////////////
    //Example #3 Code with async/await:  
    async function fetchData() {
        try {
            let response = await fetch('{{ asset("public/heckt0r.json") }}'); // Use fetch to make the GET request
            let jsonData = await response.json(); // Wait for the response to be converted to JSON
            let elOne = jsonData[0].name; // Accessing the first element's "name" property
            document.write(JSON.stringify(jsonData), "<br><br>", elOne); // Display the data
        } catch (error) {
            console.error("Error fetching data:", error);
        }
    }
    fetchData(); // Call the async function to initiate the request
    // /////////////////////////////////////////////////////////////////////////////////////////////////
    // 3. Code with .then() and .catch():
    function fetchData() {
        fetch('{{ asset("public/heckt0r.json") }}') // Make the GET request
            .then(response => response.json()) // Convert response to JSON
            .then(jsonData => {
                let elOne = jsonData[0].name; // Accessing the first element's "name" property
                document.write(JSON.stringify(jsonData), "<br><br>", elOne); // Display the data
            })
            .catch(error => {
                console.error("Error fetching data:", error);
            });
    }
    fetchData(); // Call the function to initiate the request .
    // /////////////////////////////////////////////////////////////////////////////////////////////////
</script>