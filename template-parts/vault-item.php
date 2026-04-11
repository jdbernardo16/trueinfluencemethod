<?php

/**
 * Template part: Vault Item
 * 
 * Displays a single vault resource item for the vault page.
 * 
 * @package tim-wordpress
 */

// Get vault item data from the loop
$vault_title = get_query_var('vault_title', '');
$vault_description = get_query_var('vault_description', '');
$vault_icon = get_query_var('vault_icon', '');
$vault_is_bonus = get_query_var('vault_is_bonus', false);
?>

<div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-[#faf8f5]">
    <div class="w-14 h-14 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
        <?php echo $vault_icon; ?>
    </div>
    <h3 class="font-serif text-xl text-[#0f203d] mb-3">
        <?php echo esc_html($vault_title); ?>
    </h3>
    <p class="text-[#0f203d]/60 leading-relaxed">
        <?php echo esc_html($vault_description); ?>
    </p>
</div>