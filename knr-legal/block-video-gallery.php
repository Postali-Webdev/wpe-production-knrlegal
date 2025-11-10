<?php
/**
 * Video Gallery Block
 *
 * @package knr
 * @author Postali
 */

 //Video Widget
$video_list= get_field('videos','options');
$count_videos = -1;
$count_chapters = -1;
?>

<section id="block-video-gallery">
    <div class="container bordered">
        <div class="columns">
            <div class="column-66 video_container">
                <?php if ( have_rows('videos','options') ) : while ( have_rows('videos','options') ) : 
                    the_row(); 
                    $video_id = get_sub_field('video_id');
                    $title = get_sub_field('video_title');
                    $copy = get_sub_field('video_copy');
                    $count_videos++;
                    ?>
                    <div class="video-item <?php echo 'chapter-' . $count_videos; echo (  $count_videos === 0 ? ' active' : '' );?>">
                        <div class="video-thumb">
                            <iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>?h=9e7524fd96&title=0&byline=0&portrait=0&badge=0" class="vimeo-iframe" style="" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <h3>Chapter <?php echo ( $count_videos < 10 ? '0' . $count_videos : $count_videos ) . ' - ' . $title ?></h3>
                        <p><?php echo $copy; ?></p>
                    </div>
                <?php endwhile; endif; ?>
            </div>

            <div class="column-33 navigation_container">
                <h3>Chapters</h3>
                <ul class="chapter-links-container">
                    <?php if ( have_rows('videos','options') ) : while ( have_rows('videos','options') ) : 
                        the_row(); 
                        $title = get_sub_field('video_title');
                        $count_chapters++;
                        ?>
                        <li class="chapter-link <?php echo (  $count_chapters === 0 ? 'active' : '' ); ?>" data-chapter="<?php echo 'chapter-' . $count_chapters;?>"><span class="chapter-num"><?php echo ( $count_chapters < 10 ? '0' . $count_chapters : $count_chapters ); ?></span> <span class="redWhacks"> // </span> <span class="chapter-title"><?php echo $title; ?></span></li>
                        
                    <?php endwhile; endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>