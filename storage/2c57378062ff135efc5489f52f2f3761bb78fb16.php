
<?php $__env->startSection('title', 'Moschino'); ?>
<?php $__env->startSection('main-content'); ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area column two-thirds">
        <main id="main" class="site-main" role="main">
            <div class="grid bloggrid">
                <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article>
                    <header class="entry-header">
                        <h1 class="entry-title"><a href="<?php echo e(BASE_URL); ?>blog/detail?id= <?php echo e($item->id); ?>" rel="bookmark"><?php echo e($item->name); ?></a></h1>
                        <div class="entry-meta">
                            <span class="posted-on"><time class="entry-date published"><?php echo e($item->updated_at); ?></time></span>
                            <span class="comments-link"><a href="<?php echo e(BASE_URL); ?>blog/detail?id= <?php echo e($item->id); ?>">Leave a comment</a></span>
                        </div>
                        <div class="entry-thumbnail">
                            <img src="https://organicfood.vn/image/catalog/BLOG/rau%20cu%20qua.jpg" alt="">
                        </div>
                    </header>
                    <div class="entry-summary">
                        <p>
                            <?php echo e($item->detail); ?><a class="more-link" href="<?php echo e(BASE_URL); ?>blog/detail?id= <?php echo e($item->id); ?>">Read more</a>
                        </p>
                    </div>
                    <footer class="entry-footer">
                        <span class="cat-links">
                            Posted in <a href="#" rel="category tag">audio</a>, <a href="#" rel="category tag">embed</a>, <a href="#" rel="category tag">media</a>
                        </span>
                    </footer>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="clearfix">
            </div>
            <nav class="pagination"></nav>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <div id="secondary" class="column third">
        <div id="sidebar-1" class="widget-area" role="complementary">
            <aside id="recent-posts-2" class="widget widget_recent_entries">
                <h4 class="widget-title">Recent Posts</h4>
                <ul>
                <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(BASE_URL); ?>blog/detail?id= <?php echo e($item->id); ?>"><?php echo e($item->name); ?></a>
                    </li>
                    <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </aside>


            <aside id="text-6" class="widget widget_text">
                <h4 class="widget-title">Like us on Facebook</h4>
                <div class="textwidget">
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=575390339714043&autoLogAppEvents=1" nonce="Oecgbcaz"></script>

                    <div class="fb-page" data-href="https://www.facebook.com/thucphamsachhp.com.vn" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/thucphamsachhp.com.vn" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thucphamsachhp.com.vn">Shop Trống Choai</a></blockquote>
                    </div>
                </div>
            </aside>
        </div>
        <!-- .widget-area -->
    </div>
    <!-- #secondary -->
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\frontend/blog/blog.blade.php ENDPATH**/ ?>