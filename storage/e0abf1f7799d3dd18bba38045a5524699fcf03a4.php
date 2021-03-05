
<?php $__env->startSection('title', 'Moschino'); ?>
<?php $__env->startSection('main-content'); ?>
<div id="content" class="site-content">
			<div id="primary" class="content-area column two-thirds">
				<main id="main" class="site-main" role="main">
				<article>
				<header class="entry-header">
				<h1 class="entry-title"><?php echo e($detail_blog->name); ?></h1>
				<div class="entry-meta">
						<span class="posted-on"><time class="entry-date published"><?php echo e($detail_blog->updated_at); ?></time></span>						
						<span class="comments-link"><a href="#">Leave a comment</a></span>
					</div>
				<!-- <div class="entry-thumbnail">					
					<img src="http://s3.amazonaws.com/caymandemo/wp-content/uploads/sites/10/2015/09/30160348/sep4.jpg" alt="">
				</div> -->
				</header>
				<!-- .entry-header -->
				<div class="entry-content">
					<p>             
                    <?= $detail_blog->description ?>
					</p> 				</div>
				<!-- .entry-content -->

				<!-- .entry-footer -->
				</article>
				<!-- #post-## -->
				<nav class="navigation post-navigation" role="navigation">
				<h1 class="screen-reader-text">Post navigation</h1>
				<div class="nav-links">
					<div class="nav-previous">
						<a href="<?php echo e(BASE_URL.'blog'); ?>" rel="prev"><span class="meta-nav">←</span> Thanks for watching!</a>
					</div>
				</div>
				<!-- .nav-links -->
				</nav>
		
				<!-- #comments -->
				</main>
				<!-- #main -->
			</div>
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
<script type="text/javascript">
    tinymce.init({
        selector: "#mytextarea"
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\frontend/blog/detail.blade.php ENDPATH**/ ?>