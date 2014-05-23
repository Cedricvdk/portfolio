<?php get_header(); ?>
		<div id="content" class="wrapper">
    		<div id="main">
                <?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
                <h2 class="mainHead center">Cedric Van der Kelen</h2>
                <p class="center">proDUCE</p>

                <?php query_posts('showposts=1'); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" class="post postbrdr" role="article">
                        <header class="posthead">
                            <h2>
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                            </h2>
                        </header>

                        <section class="post-content clearfix">
                            <?php the_content(); ?>
                        </section>
                    </article>
                <?php endwhile; ?>

                <?php else : ?>
                    <article id="post-not-found" class="post">
                        <header class="posthead">
                            <h2>Whoops! Looks like we can't find this post.</h2>
                        </header>

                        <section class="post-content">
                            <p>It seems like this post is missing somewhere. Double-check the URL or try navigating back via the website menu links.</p>
                        </section>
                    </article>
                <?php endif; ?>//
			</div> <!-- /#main -->
		</div> <!-- /#content -->
		
		<br style="clear:both;">
<?php get_footer(); ?>