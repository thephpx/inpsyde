<form method="post" action="<?php echo (admin_url('admin-post.php')); ?>">
    <input type="hidden" name="action" value="<?php echo $data['inpsyde_form_action'];?>"/>
    <input type="hidden" name="inpsyde_form_nonce" value="<?php echo $data['inpsyde_form_nonce']; ?>"/>
    <button type="submit">Submit</button>
</form>