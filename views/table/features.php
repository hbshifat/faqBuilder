<div class="wp_pricing_table_features wp_pricing_column_element">
    <div class="wp_pricing_features_lists">
        <?php foreach ($features as $featureIndex => $feature): ?>
        <div class="wp_pricing_feature_item wp_pricing_feature_<?php echo $featureIndex + 1 ?>">
            <?php if($feature['icon_class']): ?>
            <i class="<?php echo $feature['icon_class']; ?>"></i>
            <?php endif; ?>
            <span><?php echo $feature['title']; ?></span>
            <?php if($feature['hint_text']): ?>
                <span>? - <?php echo $feature['hint_text']; ?></span>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        
    </div>
</div>