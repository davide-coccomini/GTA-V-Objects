<?php 
    $objectId = $_GET["oid"];
    $object = getObject($objectId);
    $nearObjects = getNearObjects($objectId);
?>
    <div class="wrapper">
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="<?php echo $object["path"]; ?>" alt="full-image">
                                        </div>
                                        <center><h3><b>← Near objects →</b></h3></center>
                                        <div class="row">
                                            <?php foreach ($nearObjects as $nearObject): ?>
                                            <div role="tabpanel" class="col-md-3">
                                             <a href="/web/index.php?page=details&oid=<?php echo $nearObject["id"]; ?>">
                                                <img src="<?php echo $nearObject["path"]; ?>" alt="full-image">
                                             </a>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                               
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $object["name"]; ?></h2>
                                <h6>Category: <span><?php echo $object["category"]; ?></span></h6>
                                <h6>Subcategory: <span><?php echo $object["subcategory"]; ?></span></h6>
                             
                             
                                    <div class="sin__desc align--left">
                                        <p><span>Tags:</span></p>
                                        <ul class="pro__cat__list">
                                            <?php 
                                                foreach(getTags($object["id"]) as $tag){
                                                    echo "<li><div class='tag-box'>".$tag."</div></li>";
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            <br><br>
                            <button onclick="showTagsForm(this)" id="buttonDetailsForm">+</button>
                            <form action = "php/details-process.php" method="POST" id="detailsForm">
                                <input type = "text" name = "tags" placeholder="Tags separated by comma">
                                <input type = "password" name="password" placeholder = "Password">
                                <input type = "hidden" name="id" value="<?php echo $object["id"]; ?>">
                                <input type = "submit" class="col-md-2" value="Add">
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
      
     
     
    </div>
