<div class="wrap">
	<?php screen_icon(); ?>
	<h2>WPCore Plugin Collections</h2>
	<div class="grid">
		<div class="unit three-quarters">
			<form method="post" action="options.php">
				<?php settings_fields( 'default' ); ?>
				<table class="wp-list-table widefat fixed pages" id="wpcore_keys">
					<thead valign="top">
					<tr>
						<th class="manage-column column-title" scope="row" width="30%">Collection name and key</th>
						<th class="manage-column column-title" scope="row" width="70%"><label for="wpcore_key">Plugins in the collection</label></th>
						<th width="10%"></th>
					</tr>
					</thead>
					<tbody>
					<?php
					$payload = $this->get_payload();
					if( is_array($payload) && count($payload) > 0 ):
						foreach($payload as $collection){

							?>
								<tr>
									<td>
										<h3><?php echo isset( $collection['data']['name'] ) ? $collection['data']['name'] : 'Bad Key'; ?></h3>
										<p><input type="text" id="wpcore_keys" name="wpcore_keys[]" value="<?php echo $collection['data']['key']; ?>" required="required"></p>
										<?php if( isset($collection['data']['name']) ): ?>
											<a href="https://wpcore.com/collections/<?php echo $collection['data']['key']; ?>" target="_blank">View on WPCore.com</a>
										<?php endif; ?>
									</td>
									<td>
										<ul>
											<?php
											if( $collection['success'] == true ) {
												$count = count( $collection['data']['plugins'] );
												$i = 1;
												foreach( $collection['data']['plugins'] as $plugin ){
													?>
													<a href="<?php echo get_admin_url(); ?>plugin-install.php?tab=plugin-information&plugin=<?php echo $plugin['slug']; ?>&TB_iframe=true&width=640&height=500" class="thickbox" title="<?php echo $plugin['name']; ?>"><?php echo $plugin['name']; ?></a>
													<?php
													if( $i != $count )
														echo ', ';
													$i++;
												}
											} else {
												echo 'Bad key';
											}
											?>
										</ul>
									</td>
									<td align="right">
										<input type="button" class="wpcore_ibtnDel button button-small"  value="Delete">
									</td>
								</tr>
							<?php }

					else:

						echo '<p>Click the add key button below to add a collection key</p>';

					endif;
					?>
					</tbody>
				</table>
				</p>
				<?php if( is_array($payload) && count( $payload ) ):?>
					<input type="button" id="wpcore_addrow" class="button button-large" value="Add another collection key" />
					<a href="<?php echo TGM_Plugin_Activation::get_instance()->parent_slug; ?>?page=<?php echo TGM_Plugin_Activation::get_instance()->menu; ?>" class="button button-large float-right">Install Plugins</a>



				<?php else: ?>
					<input type="button" id="wpcore_addrow" class="button button-large" value="Add a collection key" />
				<?php endif; ?>
				</p>
				<hr>
				<?php submit_button('Save Collections'); ?>
				<h3>Clear Cache</h3>
				<p>To speed up performance we cache the plugin array in your local WordPress database. If you want to clear it now (perhaps you just added a new plugin to one of your collections and you are not seeing it here), simply click this button:</p>
				<?php submit_button('Clear Cache'); ?>
			</form>
		</div>
		<div class="unit one-quarter metabox-holder">
			<div class="postbox">
				<h3>Export plugins to a collection</h3>
				<div class="inside">
					<div class="main">
						<p>Quickly export all the plugins on this site into a new collection at WPCore.com.</p>
						<p><a href="<?php echo $this->wpcore_export_link(); ?>" class="button button-large" target="_blank">Export active plugins</a></p>
						<p><a href="<?php echo $this->wpcore_export_link(false); ?>" class="button button-large" target="_blank">Export all plugins</a></p>
					</div>
				</div>
			</div>
			<div class="postbox">
				<h3>A little more guidance</h3>
				<div class="inside">
					<div class="main">
						<p>On this page you can store your collection keys. You can create and manage your collections at <a href="https://wpcore.com" target="_blank">WPCore.com</a>. For example <a href="https://wpcore.com/collections/6ib8eOIBndO5u0DTrmOt" target="_blank">this</a> is a collection.</p>
						<?php echo '<img src="' . plugins_url( '../assets/img/key.png' , __FILE__ ) . '" > '; ?>
						<p>Collection keys appear at the top of each <a href="https://wpcore.com/collections/6ib8eOIBndO5u0DTrmOt" target="_blank">collection</a>. When you add a key to this table, it will bring the plugins from that collection into the plugin staging area where you can install and activate them.</p>
						<p>You of course should make your own collection and add it to your WordPress sites.</p>
					</div>
				</div>
			</div>
			<div class="postbox">
				<h3>Use the WP-CLI</h3>
				<div class="inside">
					<div class="main">
						<p>You can install and activate your plugins using the WordPress CLI.</p>
						<p><code>wp wpcore install --key=12345</code></p>
						<p><strong>Options</strong></h3>
						<p><code>--force=yes</code><br/>Overwrite existing plugins if installed</p>
						<p><code>--activate=yes</code><br/>Activate the plugins</p>
						<p><code>--network=yes</code><br/>Network activate all</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>