<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>GTA V - Objects List</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
<?php
include("php/config.php");
include("php/utility.php");
$ELEMENTS_PER_PAGE=20;
if(isset($_GET["p"])){
  $page=$_GET["p"];
}else{
  $page=1;
}

$offset=($page*$ELEMENTS_PER_PAGE)-$ELEMENTS_PER_PAGE;

$category = (isset($_GET["c"]))?$_GET["c"]:null;
$subcategory = (isset($_GET["s"]))?$_GET["s"]:null;
$query = (isset($_GET["q"]))?$_GET["q"]:""; 
$objectsNumber = getObjects($category, $subcategory, $query, $ELEMENTS_PER_PAGE, $offset, "count");

$pagesNumber=ceil($objectsNumber/$ELEMENTS_PER_PAGE);


$objects = getObjects($category, $subcategory, $query, $ELEMENTS_PER_PAGE, $offset, "records");

?>

<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.html"><img src="images/logo.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="/web/objects.php">Home</a></li>
                                        <li class="drop"><a href="#">Categories</a>
                                            <ul class="dropdown mega_dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.html">Buildings</a>
                                                    <ul class="mega__item">
                                                        <li><a href="objects.php">Test1</a></li>
                                                        <li><a href="objects.php">Test2</a></li>
                                                        <li><a href="objects.php">Test3</a></li>
                                                        <li><a href="objects.php">Test4</a></li>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                   <li><a class="mega__title" href="product-grid.html">Buildings</a>
                                                       <ul class="mega__item">
                                                           <li><a href="objects.php">Test1</a></li>
                                                           <li><a href="objects.php">Test2</a></li>
                                                           <li><a href="objects.php">Test3</a></li>
                                                           <li><a href="objects.php">Test4</a></li>
                                                       </ul>
                                                   </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                   <li><a class="mega__title" href="product-grid.html">Buildings</a>
                                                       <ul class="mega__item">
                                                           <li><a href="objects.php">Test1</a></li>
                                                           <li><a href="objects.php">Test2</a></li>
                                                           <li><a href="objects.php">Test3</a></li>
                                                           <li><a href="objects.php">Test4</a></li>
                                                       </ul>
                                                   </li>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                       
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                           
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->

        
          
        <!-- End Offset Wrapper -->
      
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Objects</h2>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">   
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <?php 
                                foreach ($objects as $object):
                            ?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.html">
                                            <img <?php echo "src='".$object['path']."'"; ?> alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__product__inner">
                                        <input type="text" <?php echo 'value="'.$object["name"].'" id="'.$object["name"].'"'; ?>>
                                    </div>
                                    <input value="COPY" class="col-md-12" type="button" onclick="copyText(<?php echo $object['name']; ?>, this)">
                                    
                                </div>
                            </div>
                            <!-- End Single Category -->
                           <?php
                                endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start pages navigation -->
        <section class="htc__category__area ptb--100">
            <center>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item">
                        <?php
                        $pageP=$page-1;
                        if($pageP>0)
                            echo'<a class="page-link" href="/web/objects.php?p='.$pageP.'" aria-label="Previous">';
                        else
                            echo'<a class="page-link" href="#" aria-label="Previous">';
                        ?>
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <?php
                        $range = isMobile()?1:6;
                        for($i=$page-(($page>=$range)?$range:$page)+1; $i<=$pagesNumber && $i <= $page+$range; $i++){

                            if($i==$page)
                                echo "<li class='page-item'><a class='page-link' id='page-active' href='/web/objects.php?p=".$i."'>".$i."</a></li>";
                            else
                                echo "<li class='page-item'><a class='page-link' href='/web/objects.php?p=".$i."'>".$i."</a></li>";
                        } 
                        ?>
                        <li class="page-item">
                        <?php
                        $pageN=$page+1;
                        if($pageN<=$pagesNumber)
                            echo'<a class="page-link" href="/web/objects.php?p='.$pageN.'" aria-label="Next">';
                        else
                            echo'<a class="page-link" href="#" aria-label="Next">';

                        ?>
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                        <li>
                        <?php
                        if($page != $pagine && $pagine > 1)
                            echo "<a class='page-link' href='/objects.php?p=".$pagine."'>".$pagine."</a>";
                        ?>
                        </li>
                    </ul>
                </nav>
            </center>
        </section>
        <!-- End pages navigation -->
        <!-- Start Footer Area -->
        <footer id="htc__footer">
        
            <!-- Start Copyright Area -->
            <div class="htc__copyright bg__cat--5">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copyright__inner">
                                <p>Made By <a href="https://www.linkedin.com/in/davide-coccomini/" target="blank_">Davide Morello</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>