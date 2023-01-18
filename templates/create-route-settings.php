<?php

class FP_React_Route_Create {
    public function __construct() {
        add_action('rest_api_init', [$this, 'create_rest_routes']);
    }
    public function create_rest_routes() {
        register_rest_route('fp/v1', '/settings', [
            'methods' => 'GET',
            'callback' => [$this, 'get_settings'],
            'permission_callback' => [$this, 'get_settings_permission']
        ]);
        register_rest_route('fp/v1', '/settings', [
            'methods' => 'POST',
            'callback' => [$this, 'save_settings'],
            'permission_callback' => [$this, 'save_settings_permission']
        ]);
    }
    public function get_settings()
    {
        $firstname = get_option('work-settings-firstname');
        $lastname = get_option('work-settings-lastname');
        $email = get_option('work-settings-email');
        $response = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email
        ];
        return rest_ensure_response($response);
    }
    public function get_settings_permission() {
        return true;
    }
    public function save_settings($req)
    {
        $firstname = sanitize_text_field($req['firstname']);
        $lastname = sanitize_text_field($req['lastname']);
        $email = sanitize_text_field($req['email']);

        update_option('work-settings-firstname', $firstname);
        update_option('work-settings-lastname', $lastname);
        update_option('work-settings-email', $email);

        return rest_ensure_response('success');
    }
    public function save_settings_permission() {
        return true;
    }
}
new FP_React_Route_Create();