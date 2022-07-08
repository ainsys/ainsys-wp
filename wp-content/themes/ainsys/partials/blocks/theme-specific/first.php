<?php
/**
 * First block.
 *
 * @package ainsys
 */

$block_id = 'toggler-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'toggler full-width';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( get_field( 'bg_color' ) ) {
	$class_name .= ' bg-color-' . get_field( 'bg_color' );
}
$style       = '';
$style_bg    = '';
$style_align = '';
if ( get_field( 'bg_img' ) ) {
	$style_bg = 'background-image: url(' . wp_get_attachment_image_url( get_field( 'bg_img' ), 'full' ) . '); ';
}
if ( get_field( 'bg_alignment' ) ) {
	$style_align = 'background-position: ' . get_field( 'bg_alignment' ) . ';';
}
if ( get_field( 'bg_img' ) || get_field( 'bg_alignment' ) ) {
	$style = ' style="' . $style_bg . $style_align . '"';
}

?>



<section class="first">
		<div class="container">
            <div class="first_content">
                <div class="first_content_info col-lg-5 col-12">
					<?php if ( get_field( 'text' ) ) { ?>
                        <p class="first_text"><?php the_field( 'text' ); ?></p>
                    <?php } ?>
                    <div class="first_title">
                        <h1>
                            <div class="first_title_block">
                            <div class="first_title_block_wrapper"></div>
                                <?php if ( get_field( 'title_top' ) ) { ?>
                                    &gt;<span id="Ticker"><?php the_field( 'title_top' ); ?></span>&lt;
                                <?php } ?>
                            </div>
                            <?php if ( get_field( 'title_bottom' ) ) { ?>
                                <?php the_field( 'title_bottom' ); ?>
                            <?php } ?>
                        </h1>
                    </div> 
                    <?php if ( get_field( 'btn' ) ) { ?>
                        <button class="first_btn btn btn-primary"><?php the_field( 'btn' ); ?></button>
                    <?php } ?> 
                </div>
                <div class="first_content_video  col-lg-7 col-12">
                    <div class="first_content_video_block">
                        <img class="first_content_video_bg_main" src="<?= get_field('video_bg');?>" alt="video bg">
                        <img class="first_content_video_bg" src="<?= get_field('video_bg_two');?>" alt="video bg">
                        <img class="first_content_video_play" src="<?= get_field('video_play');?>" alt="video play">
                        <div class="first_content_video_wrapper">
                            <?php if ( get_field( 'video_text' ) ) { ?>
                                <p class="first_content_video_wrapper_text"><?php the_field( 'video_text' ); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="first_modal">
                <div class="first_modal_close"></div>
					<?php if ( have_rows( 'video_block' ) ) : ?>
						<video loop muted autoplay preload="metadata" 
							<?php
							while ( have_rows( 'video_block' ) ) {
								the_row();
								?>
								<source src="<?php the_sub_field( 'video' ); ?>" type="video/<?php the_sub_field( 'type' ); ?>">
							<?php } ?>
						</video>
					<?php endif; ?>
				</div>
		    </div>
		</div>		
</section>


<?php if ( have_rows( 'animated_text' ) ) : ?>
	<script type="text/javascript">
		const CharTimeout = 50;
		const StoryTimeout = 2000;

		const Summaries = new Array();
		const SiteLinks = new Array();

		<?php
		$i = 0;
		while ( have_rows( 'animated_text' ) ) :
			the_row();
			?>
			Summaries[<?php echo $i; ?>] = '<?php the_sub_field( 'text' ); ?>';
		<?php
		$i++;
		endwhile;
		?>

		function runTheTicker(){
			var myTimeout;  

			if(CurrentLength == 0){
				CurrentStory++;
				CurrentStory      = CurrentStory % massiveItemCount;
				StorySummary      = Summaries[CurrentStory].replace(/"/g,'-');      
			}
			AnchorObject.innerHTML = StorySummary.substring(0,CurrentLength) + znak();
			if(CurrentLength != StorySummary.length){
				CurrentLength++;
				myTimeout = CharTimeout;
			} else {
				CurrentLength = 0;
				myTimeout = StoryTimeout;
			}
			setTimeout("runTheTicker()", myTimeout);
		}

		function znak(){
			if(CurrentLength == StorySummary.length) return "";
			else return "|";
		}
		function startTicker(){
			massiveItemCount =  Number(Summaries.length); 

			CurrentStory     = -1;
			CurrentLength    = 0;

			AnchorObject     = document.getElementById("Ticker");
			runTheTicker();     
		}

		startTicker();
	</script>
<?php endif; ?>