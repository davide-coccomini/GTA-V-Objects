 <!-- Start Header Style -->
 <?php
    // Categories
    $categories = getCategories();
 ?>
<header id="htc__header" class="htc__header__area header--one">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                        <div class="logo">
                                <a href="/web/index.php"><img src="images/logo.png" alt="logo images"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="/web/index.php">Home</a></li>
                                <li class="drop"><a href="#">Categories</a>
                                    <ul class="dropdown mega_dropdown">
                                        <?php 
                                            foreach (array_keys($categories) as $category):
                                        ?>
                                        <!-- Start Single Mega MEnu -->
                                        <li><a class="mega__title" href="/web/index.php"><?php echo $category; ?></a>
                                            <ul class="mega__item">
                                                <?php foreach ($categories[$category] as $subcategory):
                                                        $variables = [
                                                            "c" => $category,
                                                            "s" => $subcategory,
                                                            "q" => $_GET["q"]
                                                        ];
                                                        $URL = formatURL("/web/index.php", $variables);    
                                                ?>
                                                    
                                                    <li><a href="<?php echo $URL; ?>"><?php echo cleanName($subcategory); ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                        <!-- End Single Mega MEnu -->
                                        <?php
                                            endforeach;
                                        ?>
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