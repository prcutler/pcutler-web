<li>
	<img src="<?php echo esc_url($account->avatar()); ?>" width="24" height="24" />
	<span>
<<<<<<< HEAD
<?php
$broadcasted = esc_html($service->title());
if (isset($broadcasted_id)) {
	if ($account->has_user() or $service->key() != 'twitter') {
		$url = $service->status_url($account->username(), $broadcasted_id);
		if (!empty($url)) {
			$broadcasted = '<a href="'.esc_url($url).'" target="_blank">'.esc_html($service->title()).'</a>';
		}
	}
}
echo esc_html($account->name()).' &middot; '.$broadcasted;
?>
=======
		<?php
			$broadcasted = $service->title();
			if (isset($broadcasted_id)) {
				if ($account->has_user() or $service->key() != 'twitter') {
					$broadcasted = '<a href="'.esc_url($service->status_url($account->username(), $broadcasted_id)).'" target="_blank">'.$service->title().'</a>';
				}
			}
			echo esc_html($account->name()).' &middot; '.$broadcasted;
		?>
>>>>>>> 66cc174192049b05f02b6fe33016c7f96e0f6a9d
	</span>
</li>
