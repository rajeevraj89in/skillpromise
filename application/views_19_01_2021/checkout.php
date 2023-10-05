<form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'verify'; ?>" method="POST">
    <?php
    $data['key'] = "rzp_test_jkNt9TKk2upOcG";
    $data['amount'] = "100";
    $data['name'] = "Gaurav Chandra Dey";

    $data['description'] = "Hello";
    $data['prefill']['name'] = "Gaurav";
    $data['prefill']['email'] = "gaurav.dey@lexiconcpl.com";
    $data['prefill']['contact'] = "8434973321";
    ?>
    <script src="<?php echo(base_url() . 'assets/js/' . 'checkout-frame.js'); ?>"></script>
    <script
        src="<?php echo(base_url() . 'assets/js/' . 'checkout.js'); ?>"
        data-key="<?php echo $data['key'] ?>"
        data-amount="<?php echo $data['amount'] ?>"
        data-currency="INR"
        data-name="<?php echo $data['name'] ?>"
        data-image="<?php echo $data['image'] ?>"
        data-description="<?php echo $data['description'] ?>"
        data-prefill.name="<?php echo $data['prefill']['name'] ?>"
        data-prefill.email="<?php echo $data['prefill']['email'] ?>"
        data-prefill.contact="<?php echo $data['prefill']['contact'] ?>"
        data-notes.shopping_order_id="3456"
        data-order_id="<?php echo $data['order_id'] ?>"
        <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount'] ?>" <?php } ?>
        <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency'] ?>" <?php } ?>
    ></script>
    <input type="hidden" name="shopping_order_id" value="3456">
</form>