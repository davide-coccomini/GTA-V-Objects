
<?php
// Objects
$ELEMENTS_PER_PAGE=20;
if(isset($_GET["p"])){
  $page=$_GET["p"];
}else{
  $page=1;
}
$offset=($page*$ELEMENTS_PER_PAGE)-$ELEMENTS_PER_PAGE;
$selectedCategory = (isset($_GET["c"]))?$_GET["c"]:null;
$selectedSubcategory = (isset($_GET["s"]))?$_GET["s"]:null;
$query = (isset($_POST["q"]))?$_POST["q"]:(isset($_GET["q"])?$_GET["q"]:"");

$objectsNumber = getObjects($selectedCategory, $selectedSubcategory, $query, $ELEMENTS_PER_PAGE, $offset, "count");
$pagesNumber=ceil($objectsNumber/$ELEMENTS_PER_PAGE);
$objects = getObjects($selectedCategory, $selectedSubcategory, $query, $ELEMENTS_PER_PAGE, $offset, "records");

?>

        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Search</h2><br>
                    <div class="row">
                           <?php
                            $variables = [
                                "c" => $selectedCategory,
                                "s" => $selectedSubcategory,
                                "q" => $query
                            ];
                            $URL = formatURL("/web/index.php", $variables);    
                        ?>
                        <form action="<?php echo $URL;?>" method="POST">
                            <input id="searchbar" name="q" class="col-md-10" type="text" placeholder="Search" aria-label="Search" <?php if(isset($query)) echo "value='".$query."'";?>>   
                            <input value="SEARCH" class="col-md-2" type="submit">
                        </form>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Objects</h2><br>
                            <h3><?php 
                                echo $selectedCategory;
                                if(isset($selectedSubcategory)){
                                    echo " (".cleanName($selectedSubcategory).")";
                                }
                            ?></h3>
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
                                        <a href="/web/index.php?page=details&oid=<?php echo $object["id"]; ?>">
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
                        $variables = [
                            "c" => $selectedCategory,
                            "s" => $selectedSubcategory,
                            "q" => $query,
                            "p" => $pageP
                        ];
                        $URL = formatURL("/web/index.php", $variables); 
                        if($pageP>0)
                            echo'<a class="page-link" href="'.$URL.'" aria-label="Previous">';
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
                               $variables = [
                                    "c" => $selectedCategory,
                                    "s" => $selectedSubcategory,
                                    "q" => $query,
                                    "p" => $i
                                ];
                                $URL = formatURL("/web/index.php", $variables);   
                            if($i==$page)
                                echo "<li class='page-item'><a class='page-link' id='page-active' href='".$URL."'>".$i."</a></li>";
                            else
                                echo "<li class='page-item'><a class='page-link' href='".$URL."'>".$i."</a></li>";
                        } 
                        ?>
                        <li class="page-item">
                        <?php
                        $pageN=$page+1;
                        if($pageN<=$pagesNumber)
                            echo'<a class="page-link" href="/web/index.php?p='.$pageN.'" aria-label="Next">';
                        else
                            echo'<a class="page-link" href="#" aria-label="Next">';

                        ?>
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                        <li>
                        <?php
                        $variables = [
                            "c" => $selectedCategory,
                            "s" => $selectedSubcategory,
                            "q" => $query,
                            "p" => $pagesNumber
                        ];
                        $URL = formatURL("/web/index.php", $variables);   
                        if($page != $pagesNumber && $pagesNumber > 1)
                            echo "<a class='page-link' href='".$URL."'>".$pagesNumber."</a>";
                        ?>
                        </li>
                    </ul>
                </nav>
            </center>
        </section>
        <!-- End pages navigation -->
       