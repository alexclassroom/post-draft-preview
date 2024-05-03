<?php

namespace PostDraftPreview\Ajax;

abstract class AbstractAjax
{
    private ?string $actionName = null;

    public function __construct($actionName)
    {
        $this->actionName = $actionName;

        add_action("wp_ajax_{$this->actionName}", [$this, 'callback']);
    }

    protected function validate(): void
    {
        if (! isset($_POST['nonce']) || ! check_ajax_referer($_POST['action'], 'nonce', false)) {
            wp_send_json_error(['message' => __('Invalid value of nonce.', 'post-draft-preview')]);
        }

        if (empty($_POST['confirmation'])) {
            wp_send_json_error(['message' => __('Incomplete data.', 'post-draft-preview')]);
        }
    }

    public function callbackNopriv()
    {
        wp_send_json_error(['message' => __('Access danied.', 'post-draft-preview')]);
    }

    abstract public function callback();
}
