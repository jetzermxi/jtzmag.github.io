
    <style>
        *{
            margin: 0;
            padding: 0;

        }
        .f-container{
            background-color: black;
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            height: 50vh;
            justify-content: space-between;
            align-items: center;
        }
        .n{
            width: 25%;
            

        }
        .footer-menu{
            color: white;
            font-size: 17px;
            text-decoration: none;
            font-weight: 400;
            list-style: none;
        }
        a{
            color: white;
            display:block;
            font-size: 17px;
            text-decoration: none;
        }
        .vj-menu{
            color: white;
            font-size: 17px;
            text-decoration: none;
            font-weight: 400;
            list-style: none;
        }

        .footer-heading{
            color: white;
            display: block;
            padding: 10px;
        }
        .footer-desc{
            color: white;
            font-size: 17px;
            padding: 10px;
            
        }
        .contact-title{
            color: white;
        }
        .links-title{
            color: white;
        }
        @media only screen and (max-width: 768px) {
            .f-container{
            background-color: black;
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            height: 200vh;
            align-items: center;
        }
        .n{
            width: 100%;
            

        }
        .contact-title{
            color: white;
            text-align: center;
        }
        .send-movie{
            width: 80%;
            padding-top: 20px;
            padding-bottom: 20px;
            color: white;
            background-color: red;
            border-style:none;
            border-radius:20px;
        }
        .footer-menu{
            display:block;
            width:100%;
            margin-top:20px;
            margin-bottom:20px;
        }
        .vj-menu{
            display:block;
            width:100%;
            margin-top:20px;
            margin-bottom:20px;
        }
        
        }
    </style>
</head>
<body>

        <div class="f-container">
            <div class="n">
                <img src="" alt="">
                <h1 class="footer-heading">JTZ Movies</h1>
                <p class="footer-desc">In literary theory, a text is any object that can be "read", whether this object is a work of literature, a street sign, an arrangement of buildings on a city block, or styles of clothing. It is a set of signs that is available to be reconstructed by a reader if sufficient interpretants are available.</p>
            </div>

            <div class="n">
                <center><h1 class="links-title">Category </h1></center>
                <center><ul class="footer-ul">
                        <a href=""><li class="footer-menu">Action</li></a>
                        <a href=""><li class="footer-menu">Drama</li></a>
                        <a href=""><li class="footer-menu">Romance</li></a>
                        <a href=""><li class="footer-menu">HighSchool</li></a>
                        <a href=""><li class="footer-menu">Animation</li></a>
                        <a href=""><li class="footer-menu">Drama</li></a>
                        <a href=""><li class="footer-menu">Adventure</li></a>
                        <a href=""><li class="footer-menu">Sci-Fi</li></a>
                        <a href=""><li class="footer-menu">Horror</li></a>
                        <a href=""><li class="footer-menu">Thriller</li></a>
                        
                    </ul></center>
              
            </div>

            <div class="n">
                <center><h1 class="links-title">Your Vjs </h1></center>
                    <center><ul class="footer-ul">
                        <a href=""><li class="vj-menu">VJ Junior</li></a>
                        <a href=""><li class="vj-menu">VJ Ice P</li></a>
                        <a href=""><li class="vj-menu">VJ Kevo</li></a>
                        <a href=""><li class="vj-menu">VJ Emmy</li></a>
                        <a href=""><li class="vj-menu">VJ Jingo</li></a>
                        <a href=""><li class="vj-menu">Others</li></a>
                    </ul></center>
                </h1>
            </div>
            <div class="n">
                <h1 class="contact-title">Contact Us</h1>
                <form action="">
                    <input placeholder="Request A movie" type="text">

                </form>
                <center><button class="send-movie">Send</button></center>
            </div>
        
        </div></center>
  
</body>
</html>