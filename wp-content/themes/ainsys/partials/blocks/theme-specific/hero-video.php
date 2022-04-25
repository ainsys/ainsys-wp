<?php
/**
 * CTA block.
 *
 * @package ainsys
 */

$block_id = 'hero-video-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'hero-video full-width';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( get_field( 'bg' ) ) {
	$class_name .= ' bg-color-' . get_field( 'bg' );
}
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
	<div class="container">
		<div class="hero-video__info">
			<div class="hero-video__title">
				<h1>
					<?php if ( get_field( 'title_top' ) ) { ?>
						&gt;<span id="Ticker"><?php the_field( 'title_top' ); ?></span>&lt;
					<?php } ?>
					<?php if ( get_field( 'title_bottom' ) ) { ?>
						<br><?php the_field( 'title_bottom' ); ?>
					<?php } ?>
				</h1>
			</div>
			<?php if ( get_field( 'text' ) ) { ?>
				<p class="hero-video__text"><?php the_field( 'text' ); ?></p>
			<?php } ?> 

		</div>

		<div class="hero-video__video">
			<div class="toggler__switch">
				<div class="toggler__switch__label active"><?php the_field( 'label_with' ); ?></div>
				<div class="form-check form-switch">
					<input class="form-check-input form-check-input-content" type="checkbox">
				</div>
				<div class="toggler__switch__label"><?php the_field( 'label_without' ); ?></div>
			</div>

			<div class="toggler__screens">
				<div class="toggler__screen active">
					<div class="hero-video__video__wrapper">
						<?php if ( have_rows( 'video_with' ) ) : ?>
							<video loop muted autoplay preload="metadata"
								<?php
								while ( have_rows( 'video_with' ) ) {
									the_row();
									?>
									<source src="<?php the_sub_field( 'video' ); ?>" type="video/<?php the_sub_field( 'type' ); ?>">
								<?php } ?>
							</video>
						<?php endif; ?>
					</div>
				</div>
				<div class="toggler__screen">
					<div class="hero-video__video__wrapper">
						<?php if ( have_rows( 'video_without' ) ) : ?>
							<video loop muted autoplay preload="metadata"
								<?php
								while ( have_rows( 'video_without' ) ) {
									the_row();
									?>
									<source src="<?php the_sub_field( 'video' ); ?>" type="video/<?php the_sub_field( 'type' ); ?>">
								<?php } ?>
							</video>
						<?php endif; ?>
					</div>
				</div>
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