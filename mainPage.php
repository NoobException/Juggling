<html>
    <head>
        <?php
        require_once("common/commonHead.php"); ?>
        <style>
        :root
        {
            --main-font-size: 20px;
            --trick-width: 240px;
            --trick-height: 300px;
            --trick-padding: 5px;
        }
        </style>
        <title>Trik tygodnia</title>
        <script src = "scripts/mainPage.js"></script>
        
    </head>
    <body onload="main()">
        <?php require_once("common/userMenu.php");?>
        <div id = "page-wrapper">

            <nav id="suwajka"><section></section>
            </nav>
            
            <br/>
            
            <div style = "width:100%">
                 <div class = "slider-wrapper">
                    <input type = "button" class = "anim-button" value = "▮▮"/>
                    <input type = "range" min="1" max="1000" value="500" class = "anim-slider"/>
                </div>
                <div id = "blog-entry"></div>
            </div>
            
        </div>
        
        <footer>
            Made by: Pichał and Hichał &copy; 2019;
        </footer>
    </body>
    
</html>
