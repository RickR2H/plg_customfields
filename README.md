# plg_imguploader

The plugin was created for the Joomla days 2016 in the Netherlands.

This plugin will add a tab with custom fields in the article manager.

The custom fields attrubutes can be used in a template override for com_content -> article

Add the following to the top of the default.php in article override folder, or duplicate this default.php and change the name for example in myoverride.php. To make this override work, select it as Alternative Layout in the article Options.
```php
<?php
	// Added to extract the attributes from the article
	$attributes = json_decode($this->item->attribs);
?>
```
Replace:
```html
<div itemprop="articleBody">
	<?php echo $this->item->text; ?>
</div>
```
with:
```php
	<!-- Custom Content Article -->
	<?php
		if (!empty($attributes->custom_color))
		{
			$color_well = 'class="well" style="background-color: ' . $attributes->custom_color . '"';
		}
		else
		{
			$color_well = 'class="well"';
		}
	?>
	<?php if (!empty($attributes->custom_lefttext) && !empty($attributes->custom_righttext)) : ?>
		<div class="row-fluid">
			<div class="span6">
				<?php if (!empty($attributes->custom_title)) : ?>
					<h3>
					<?php if (!empty($attributes->custom_faicon)) : ?>
						<i class="<?php echo $attributes->custom_faicon; ?>"></i>
					<?php endif; ?>
					<?php echo $attributes->custom_title; ?>
					</h3>
				<?php endif; ?>
				<div itemprop="articleBody">
					<?php echo $this->item->text; ?>
				</div>
			</div>
			<div class="span6">
				<div <?php echo $color_well; ?>>
					<?php if (!empty($attributes->custom_image)) : ?>
						<img class="img-responsive" src="<?php echo JUri::root() . $attributes->custom_image; ?>">
						<p>&nbsp;</p>
					<?php endif; ?>
					<?php echo $attributes->custom_righttext; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<!-- \Custom Content Article -->
```
