<div class="card">
    <h2 class="title">
        <?php echo esc_html(__('Enable auto-generating preview links', 'post-draft-preview')); ?>
    </h2>

    <p>
        <?php echo esc_html(__('Do you want to generate the post draft preview automatically after the post is created?', 'post-draft-preview')); ?>
    </p>

    <form method="post">
        <ul>
            <?php foreach ($postTypes as $type) : ?>
                <li>
                    <label>
                        <input type="hidden" name="post_types[<?php echo $type['name']; ?>]" value="off">
                        <input type="checkbox" name="post_types[<?php echo $type['name']; ?>]" value="on" <?php if (true === $type['value']) : ?> checked <?php endif; ?>>
                        <?php echo $type['label']; ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>

        <input type="submit" class="button button--data-autogenerate button-secondary" value="<?php esc_attr_e( 'Confirm', 'post-draft-preview' ); ?>">
    </form>
</div>
