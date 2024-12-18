<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>javascript</title>
    <style>
        .blog {
            width: 60%;
            margin: 50px auto;
            color: #7E7E80;
            line-height: 1.8;
            text-align: center;
        }

        .blog h1 {
            font-size: 48px;
        }

        .box {
            width: 500px;
            margin: 50px auto;
            padding: 15px;
            border: 3px solid purple;
            position: relative;
        }

        .box-close {
            color: white;
            width: 25px;
            height: 25px;
            line-height: 25px;
            font-family: sans-serif;
            position: absolute;
            top: 0;
            right: 0;
            background-color: black;
        }

        .box-close:hover {
            background-color: bisque;
            color: purple;
            box-shadow: inset 0px 0px 0px 2px purple;
            cursor: pointer;
        }

        .faq {
            padding: 10px;
            margin-bottom: 50px;
            background-color: antiquewhite;
            border: 1px dotted purple;
        }

        .question {
            color: black;
            font-family: monospace;
        }

        .pointer {
            color: blue;
            cursor: pointer;
        }

        .more {
            border: 10px black solid;
        }

        .more-items {
            width: 550px;
            margin 0 auto;
            text-align: center;
            line-height: 1.8;
            font-size: 18px;
        }

        .img {
            float: left;
            padding-right: 20px;
        }

        .icon{
            float:left;
        }
    </style>
</head>

<body>
    <div id="container">
        <section>
            <div class="blog">
                <h1>Learn Jquery</h1>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi aut molestias, nobis molestiae
                    nesciunt
                    deleniti eum iste quis. Veritatis, quo? Amet maiores sint nihil eaque ex voluptatum ipsa perferendis
                    laboriosam.
                </p>

                <p class="box" id="box">
                    <span class="box-close">x</span>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, est
                    sit
                    aliquam cumque praesentium necessitatibus natus facere dolore nam, eius architecto rerum nostrum
                    quia
                    debitis eos minus omnis, pariatur quasi!
                </p>

                <p class="box">
                    <span class="box-close">x</span>

                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, est sit
                    aliquam cumque praesentium necessitatibus natus facere dolore nam, eius architecto rerum nostrum
                    quia
                    debitis eos minus omnis, pariatur quasi!
                </p>
                <p class="box">
                    <span class="box-close">x</span>

                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, est sit
                    aliquam cumque praesentium necessitatibus natus facere dolore nam, eius architecto rerum nostrum
                    quia
                    debitis eos minus omnis, pariatur quasi!
                </p>

                <div class="faq">
                    <h2 class="question">
                        what is Jquery
                    </h2>
                    <p class="answer">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis dolorem, blanditiis
                        necessitatibus officia, repellendus quisquam veniam accusantium tempora incidunt, aut distinctio
                        at
                        amet nobis commodi odit tenetur recusandae. Ipsum, aliquid?
                    </p>

                    <h2 class="question">
                        what is Jquery
                    </h2>
                    <p class="answer">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis dolorem, blanditiis
                        necessitatibus officia, repellendus quisquam veniam accusantium tempora incidunt, aut distinctio
                        at
                        amet nobis commodi odit tenetur recusandae. Ipsum, aliquid?
                    </p>
                    <h2 class="question">
                        what is Jquery
                    </h2>
                    <p class="answer">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis dolorem, blanditiis
                        necessitatibus officia, repellendus quisquam veniam accusantium tempora incidunt, aut distinctio
                        at
                        amet nobis commodi odit tenetur recusandae. Ipsum, aliquid?
                    </p>

                </div>
                <div class="more">
                    <a href="more.html" id="more">More pages is here</a>
                    <p id="place-holder"></p>
                </div>
            </div>
        </section>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(".box-close").click(function() {
                // $(this).parent().slideUp(1000);
                // $(this).parent().hide(1000);
                $(this).parent().fadeOut(1000);

            })


            $(".question").click(function(){
                // $(this).next().slideDown(1000);
                // $(this).next().slideUp(1000);
                $(this).next().slideToggle(1000);
            });

           
            // $(".faq .question").addClass("pointer");

            $(".faq .question").click(function(){
                $(this).addClass("pointer");
            });

            $(".question").append('<span class="icon">>></span>');
            

            $('#more').click(function(){
                $('#place-holder').load('{{ route("category.list") }} .app-main');
                return false;
            });






        })
    </script>
</body>

</html>
