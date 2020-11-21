<?php get_header(); ?>
<body <?php body_class();?>>
<?php get_template_part("hero"); ?>

<div class="posts" >
<?php 
    while(have_posts()){
        the_post();
    ?>

    <div class="post" <?php post_class(); ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-1">
                    <h2 class="post-title text-center">
                        <?php the_title(); ?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-1">
                    <div class="text-center">                    
                        <p>
                            <strong>
                                <?php the_author(); ?>
                            </strong>
                            <br/>
                            <?php echo get_the_date(); ?>
                        </p>
                        
                        <?php echo get_the_tag_list('<ul class="list-unstyled">',"<li></li>", "</ul>"); ?> 
                    </div>
                    <p>
                        <?php 
                            if(has_post_thumbnail()){
                                the_post_thumbnail("large", array("class"=>"img-fluid"));
                            }
                        ?>
                    </p>
                    <?php  the_content(); ?> 
                </div>

                <?php if(comments_open()): ?>
                    <div class="col-md-10 offset-1">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <?php 
    }
?>

<div class="container post-pagination">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <?php 
                the_posts_pagination(array(
                    "screen_reader_text"=> ' ',
                    "prev_text"=> "New Post",
                    "next_text"=> "Old Post"
                ))
            ?>
        </div>
    </div>
</div>
</div>

<?php get_footer(); ?>