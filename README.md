# plg_imguploader

The plugin was created for the Joomla days 2016 in the Netherlands
This plugin custom fields in the article manager

The attrubutes can be loaded in a template override for com_content -> article

Add this to the top of the article override default.php (or othername.php for example)
```php
<?php
	// Added to extract the attributes from the article
	$attributes = json_decode($this->item->attribs);
?>
```
Add the following somewhere in the article. For instance before
```html
<div itemprop="articleBody">
```
```php
	<!-- Custom Content Article -->
	<?php
		if (!empty($attributes->custom_color))
		{
			$color_well = '<div class="well" style="background-color: ' . $attributes->custom_color . '">';
		}
		else
		{
			$color_well = '<div class="well">';
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
				<?php echo $attributes->custom_lefttext; ?>
			</div>
			<div class="span6">
				<?php echo $color_well; ?>
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
