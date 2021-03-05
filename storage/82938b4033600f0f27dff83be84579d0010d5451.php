
<?php $__env->startSection('title', 'Moschino'); ?>
<?php $__env->startSection('main-content'); ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area column full">
        <main id="main" class="site-main" role="main">
            <div id="container">
                <div id="content" role="main">
                    <nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><a href="<?php echo e(BASE_URL); ?>">Home</a> / <?php echo e($pro->name); ?></nav>
                    <div itemscope itemtype="http://schema.org/Product" class="product">
                        <div class="images">
                            <a href="" itemprop="image" class="woocommerce-main-image zoom" title="" data-rel="prettyPhoto">

                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">


                                    <ol class="carousel-indicators d-flex justify-content-between">
                                        <?php $count = 0; ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"><img style="width:90px; height: 90px; " src="<?php echo e(IMAGE_URL); ?><?php echo e('/'. $pro->images); ?>" alt=""></li>
                                        <?php $__currentLoopData = $Description; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $count++; ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($count); ?>"><img style="width:90px; height: 90px; " src="<?php echo e(IMAGE_URL); ?><?php echo e('/'. $icon['name']); ?>" alt=""></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>

                                    <style>
                                        .carousel {
                                            padding-bottom: 100px !important;
                                            border: 1px solid gray;
                                        }

                                        .carousel-indicators {
                                            display: flex !important;
                                            -webkit-box-pack: justify !important;
                                            margin-left: 1% !important;
                                            -ms-flex-pack: justify !important;
                                            justify-content: space-between !important;
                                        }

                                        .carousel-indicators li {
                                            height: 75px !important;
                                            width: 100px !important;
                                            background-color: rgb(255 255 255 / 0%);

                                        }

                                        .carousel-indicators .active {
                                            background-color: rgb(255 255 255 / 0%) !important;
                                        }

                                        .carousel li {
                                            margin-right: -80px !important;
                                        }
                                    </style>

                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="<?php echo e(IMAGE_URL); ?><?php echo e('/'. $pro->images); ?>" alt="First slide" style="width:200px; height: 500px; ">
                                        </div>
                                        <?php $__currentLoopData = $Description; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="<?php echo e(IMAGE_URL); ?><?php echo e('/'. $icon['name']); ?>" alt="Second slide" style="width:200px; height: 500px;">
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                        </div>
                        <div class="summary entry-summary">
                            <h1 itemprop="name" class="product_title entry-title"><?php echo e($pro->name); ?></h1>
                            <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span itemprop="reviewCount" class="count">2</span> customer reviews)</a>
                            </div>
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <p class="price">
                                    <span class="amount" style="font-size:25px!important;"><?php echo e(number_format($pro->price)); ?>VNĐ</span>
                                </p>
                                <div itemprop="description">
                                    <div style="border: 1px solid gray; width: 46%; padding-left:10px">
                                        <h3>Parameter :</h3>
                                        <p>
                                            Name : <?php echo e($pro->name); ?> <br>
                                            Categorys: <?php echo e($pro->category->age); ?> <br>
                                            Origin : <?php echo e($pro->hometown->name); ?> <br>

                                        </p>
                                    </div>
                                </div>
                                <meta itemprop="price" content="35" />
                                <meta itemprop="priceCurrency" content="USD" />
                                <link itemprop="availability" href="http://schema.org/InStock" />

                                <div class="cart" style="margin:20px 0 ;">
                                    <a href="<?php echo e(BASE_URL.'add/'.$pro->id); ?>" class="single_add_to_cart_button button alt">Add to cart</a>
                                </div>

                                <div itemprop="description">
                                    <p>
                                        1. Look carefully before ordering <br>
                                        2. Hygienic checked goods <br>
                                        3. Ordered is to be comments<br>
                                        4. Certified by the Department of Food Safety <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br>


                        <!-- .summary -->
                        <div class="woocommerce-tabs wc-tabs-wrapper">

                            <div class="panel entry-content wc-tab" id="tab-description">
                                <h2>Product Description</h2>
                                <div style="border: 1px solid black;">
                                    <p>

                                        <?php echo $pro->description ?>

                                    </p>
                                </div>
                            </div>
                            <div class="related products">
                                <h2>Related Products</h2>
                                <ul class="products">



                                    <?php $__currentLoopData = $same_kind; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class=" product                              
                                <?php if ($loop->iteration == 1) : echo "first"; ?>
                                <?php elseif ($loop->iteration == 4) : echo "last"; ?>
                                <?php endif ?>
                                ">
                                        <a href="<?php echo e(BASE_URL.'detail?id='.$item->id); ?>">

                                            <img src="<?php echo e(IMAGE_URL); ?><?php echo e('/'. $item->images); ?>" alt="" style="height: 400px;"></img>
                                            <h3>Beige Fedora</h3>
                                            <span class="price"><del><span class="amount"></span></del><ins><span class="amount"><?php echo e(number_format($item->price)); ?>VNĐ</span></ins></span>
                                        </a>
                                        <form action="">
                                            <a href="<?php echo e(BASE_URL.'add/'.$item->id); ?>" class="single_add_to_cart_button button alt">Add to cart</a>
                                            <!-- <a href="" id="add" class="button">Add to cart</a> -->
                                        </form>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="panel entry-content wc-tab" id="tab-reviews">
                                <div id="reviews">
                                    <div id="comments">
                                        <h2><?php echo e(count($com)); ?> Reviews for Beige Jacket</h2>
                                        <ol class="commentlist">
                                            <?php $__currentLoopData = $com; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li itemprop="review" itemscope itemtype="http://schema.org/Review" class="comment">
                                                <div id="comment-3" class="comment_container">
                                                    <img alt='' src='<?php echo e(IMAGE_URL.'/'. $icon->user->images); ?>' srcset='http://0.gravatar.com/avatar/c7cab278a651f438795c2a9ebf02b5ae?s=120&amp;d=mm&amp;r=g 2x' class='avatar avatar-60 photo' height='60' width='60' />
                                                    <div class="comment-text">
                                                        <p class="meta">
                                                             <time itemprop="datePublished" datetime="<?php echo e($icon->date); ?>"><?php echo e($icon->date); ?></time>:
                                                        </p>
                                                        <div itemprop="description" class="description">
                                                            <p>
                                                            <?php echo e($icon->comment); ?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <!-- #comment-## -->


                                            <!-- #comment-## -->
                                        </ol>
                                    </div>
                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                <h3 style="margin-bottom:10px;" id="reply-title" onsubmit="return post();" class="comment-reply-title">Add a review <small><a rel="nofollow" id="cancel-comment-reply-link" href="/demo-moschino/product/woo-logo-2/#respond" style="display:none;">Cancel reply</a></small></h3>
                                               
                                               
                                                <form action="<?php echo e(BASE_URL.'comment'); ?>" method="post" id="commentform" class="comment-form" novalidate>
                                                    <p class="comment-form-rating">
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Your Review</label>
                                                        <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                    <p class="form-submit">
                                                        <input type='hidden' name='id' value='<?php echo e($_GET["id"]); ?>' id='comment_post_ID' />
                                                        <input type="submit" id="submit" class="submit" value="Submit" />

                                                    </p>
                                                </form>


                                            </div>
                                            <!-- #respond -->
                                        </div>
                                    </div>
                                    <div class="clear">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- #main -->
    </div>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('page-script'); ?>
    <script>
        var add = document.querySelector('#add_product');
        add.onclick = function() {

            alert("<?php echo e($_SESSION['add']); ?>");
        }
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\frontend/detail/index.blade.php ENDPATH**/ ?>