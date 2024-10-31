<div class="wrap">
<?php screen_icon(); ?>
<h2><?php _e( 'rsh-Tweet Button Settings', 'rsh-tweet' ); ?></h2>
<form action="options.php" method="post"> <?php
settings_fields( 'rsh-TweetBtn_settings' );
$options = get_option( 'rsh-TweetBtn_options' );
$showOptions = get_option( 'rsh-TweetBtn_show' ); ?>

<table class="form-table">
	<tbody>
		<tr valign="top">
			<th scope="row"><?php _e( 'Button Type', 'rsh-tweet' ); ?></th>
			<td id="button-style">
				<fieldset>
					
					<p>
                    <div style="float: left; padding: 10px;">
					<input name="rsh-TweetBtn_options[data-count]" type="radio" value="vertical" class="tog" <?php checked( 'vertical', $options['data-count'] ); ?> />
					<?php _e( 'Vertical with count', 'rsh-tweet' ); ?><br/><img style="margin: 5px 0px 10px 20px;" src="http://s.twimg.com/a/1281662294/images/goodies/tweetv.png" />
                    </div>
                    <div style="float: left; padding: 10px;">
                    <input name="rsh-TweetBtn_options[data-count]" type="radio" value="horizontal" class="tog" <?php checked( 'horizontal', $options['data-count'] ); ?> />
                    <?php _e( 'Horizontal with count', 'rsh-tweet' ); ?><br/><img style="margin: 5px 0px 10px 20px;" src="http://s.twimg.com/a/1281662294/images/goodies/tweeth.png" />
                    </div>
                    <div style="float: left; padding: 10px;">
                    <input name="rsh-TweetBtn_options[data-count]" type="radio" value="none" class="tog" <?php checked( 'none', $options['data-count'] ); ?> />
                    <?php _e( 'Horizontal without count', 'rsh-tweet' ); ?><br/><img style="margin: 5px 0px 10px 20px;" src="http://s.twimg.com/a/1281662294/images/goodies/tweetn.png" />
                    </div>
					</p>
					
				</fieldset>
			</td>
		</tr>
        <tr valign="top">
			<th scope="row"><?php _e( 'Position in the content', 'rsh-tweet' ); ?></th>
			<td id="position">
				<fieldset>
						<input name="rsh-TweetBtn_options[before]" type="checkbox" value="true" class="tog" <?php checked( 'true', $options['before'] ); ?> />
						<?php _e( 'Before content', 'rsh-tweet' ); ?>
					</label>
					</p>
					<p><label>
						<input name="rsh-TweetBtn_options[after]" type="checkbox" value="true" class="tog" <?php checked( 'true', $options['after'] ); ?> />
						<?php _e( 'After content', 'rsh-tweet' ); ?>
					</label>
					</p>
				</fieldset>
			</td>
		</tr>
        <tr valign="top">
			<th scope="row"><?php _e( 'Show on', 'rsh-tweet' ); ?></th>
			<td id="show-button">
				<fieldset>
						<input name="rsh-TweetBtn_show[home]" type="checkbox" value="true" class="tog" <?php checked( 'true', $showOptions['home'] ); ?> />
						<?php _e( 'Home page', 'rsh-tweet' ); ?>
					</label>
					</p>
					<p><label>
						<input name="rsh-TweetBtn_show[post]" type="checkbox" value="true" class="tog" <?php checked( 'true', $showOptions['post'] ); ?> />
						<?php _e( 'Posts', 'rsh-tweet' ); ?>
					</label>
					</p>
					<p><label>
						<input name="rsh-TweetBtn_show[page]" type="checkbox" value="true" class="tog" <?php checked( 'true', $showOptions['page'] ); ?> />
						<?php _e( 'Pages', 'rsh-tweet' ); ?>
					</label>
					</p>								
				</fieldset>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="rsh-TweetBtn_show[style]"><?php _e( 'CSS Style', 'rsh-tweet' ); ?></label></th>
			<td>
				<input name="rsh-TweetBtn_show[style]" id="rsh-TweetBtn_show[style]" value="<?php esc_attr_e( $showOptions['style'] ); ?>" type="text" size="50" /><br />
				<span class="description">Style up the div container of the Tweet button.</span>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="rsh-TweetBtn_options[data-lang]"><?php _e( 'Langugage' ); ?></label></th>
			<td>
				<select id="rsh-tweet_options[data-lang]" name="rsh-tweet_options[data-lang]"> <?php
					$langs = array(
						'en' => 'English',
						'fr' => 'French',
						'de' => 'German',
						'es' => 'Spanish',
						'ja' => 'Japanese' );
					foreach ( $langs as $code => $lang ) {
						echo "<option value=\"{$code}\" "; selected( $code, $options['data-lang'] ); echo ">{$lang}</option>";
					} ?>
				</select>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e( 'Recommend people to follow', 'rsh-tweet' ); ?></th>
			<td id="recommend">
				<fieldset>
					
					<p>
						<input name="rsh-TweetBtn_options[data-via]" value="<?php esc_attr_e( $options['data-via']); ?>" type="text" size="50" /><br />
						<span class="description">This user will be @ mentioned in the suggested Tweet</span>
					</p>
					<p>
						<input name="rsh-TweetBtn_options[data-related]" value="<?php esc_attr_e( $options['data-related']); ?>" type="text" size="50" /><br />
						<span class="description">Related account</span>
					</p>
					<p>
						<input name="rsh-TweetBtn_options[data-related-desc]" value="<?php esc_attr_e( $options['data-related-desc']); ?>" type="text" size="50" /><br />
						<span class="description">Related account description</span>
					</p>
				</fieldset>
			</td>
		</tr>
	</tbody>
</table>
<p class="submit"> 
	<input type="submit" name="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes' ); ?>" /> 
</p>
</form></div>

</div>