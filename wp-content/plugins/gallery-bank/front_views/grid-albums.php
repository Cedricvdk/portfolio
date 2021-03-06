<button class="album_back_btn" id="back_button<?php echo $unique_id; ?>" style="display: none;"
  onclick="view_albums<?php echo $unique_id; ?>(<?php echo $unique_id; ?>);">
    <span style="color: <?php echo $button_text_color; ?>;"> <?php echo $back_button_text; ?></span>
</button>
<!------------------------------------------->

<!------   Code for Back Button Separator ------->
<div id="seperator<?php echo $unique_id; ?>" class="separator-doubled" style="display: none"></div>
    <!------------------------------------------->

    <!------   Code for Albums ------->
<div class="albums-in-row_<?php echo $unique_id; ?>" id="view_gallery_bank_albums_<?php echo $unique_id; ?>">
	<?php
	for ($flag = 0;$flag < count($album);$flag++)
	{
	    $albumCover = $wpdb->get_row
	    (
	        $wpdb->prepare
	            (
	                "SELECT album_cover,thumbnail_url FROM " . gallery_bank_pics() . " WHERE album_cover=1 and album_id = %d",
	                $album[$flag]->album_id
	            )
	    );
   	 ?>
    	<div class="albums_margin">
			<div class="gallery-bank-hover-details">
	        <div class="imgLiquid dynamic_cover_css" id="<?php echo $unique_id; ?>"
				onclick="view_album_images<?php echo $unique_id; ?>(<?php echo $album[$flag]->album_id; ?>,<?php echo $unique_id; ?>)">
				<?php
					if (count($albumCover) != 0) {
						if ($albumCover->album_cover == 0) {
							?>
							<img id="albumOrder_<?php echo $album[$flag]->album_id; ?>"
							 src="<?php echo stripcslashes(GALLERY_BK_PLUGIN_URL . "/assets/images/album-cover.png"); ?>"
							style="height:<?php echo $cover_thumbnail_height; ?>px;"/>
							<?php
						} else {
							?>
							<img id="albumOrder_<?php echo $album[$flag]->album_id; ?>"
								src="<?php echo stripcslashes(GALLERY_BK_ALBUM_THUMB_URL . $albumCover->thumbnail_url); ?>"/>
							<?php
						}
					} else {
						?>
						<img id="albumOrder_<?php echo $album[$flag]->album_id; ?>"
							src="<?php echo stripcslashes(GALLERY_BK_PLUGIN_URL . "/assets/images/album-cover.png"); ?>"
							style="height:<?php echo $cover_thumbnail_height; ?>px;"/>
						<?php
					}
					?>
					<div class="gallery-bank-album-detail"></div>
				</div>
			</div>
			<div class="album_holder">
				<?php
				if ($album[$flag]->album_name != "Untitled Album" && $img_title == "true") {
					?>
					<h5>
						<?php echo stripcslashes($album[$flag]->album_name); ?>
					</h5>
					<?php
				}
				if ($img_desc == "true") {
					$string = stripcslashes(htmlspecialchars_decode($album[$flag]->description));
					$description = (strlen($string) > $album_desc_length) ? substr($string, 0, $album_desc_length) . "..." : $string;
					?>
					<p>
						<?php echo $description; ?>
					</p>
					<?php
				}
					?>
                <div class="album_link">
                    <a onclick="view_album_images<?php echo $unique_id; ?>(<?php echo $album[$flag]->album_id; ?>,<?php echo $unique_id; ?>)">
                        <?php echo $album_click_text; ?>
                    </a>
                </div>
			</div>
		</div>
	<?php
	}
	?>
</div>
<?php
if ($album_seperator == 1) {
    ?>
    <div id="seperator1<?php echo $unique_id; ?>" class="separator-doubled"></div>
<?php
}
    ?>
<div id="bank_album_images_div<?php echo $unique_id; ?>" style="display: none;">
	<div id="show_bank_album_images<?php echo $unique_id; ?>" style="margin-top: 5px;">
	</div>
</div>
