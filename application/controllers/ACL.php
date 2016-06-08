<?php

class ACL extends My_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function aclcreate()
    {
        $this->db->insert('acl_categories', array(
            'category_name' => 'events',
            'category_desc' => 'Events Permissions'
        ));

        $this->db->insert('acl_categories', array(
            'category_name' => 'users',
            'category_desc' => 'Users Permissions'
        ));

        $this->db->insert('acl_categories', array(
            'category_name' => 'statistics',
            'category_desc' => 'Statistics Permissions'
        ));

        $this->db->insert('acl_actions', array(
            'action_name' => 'list_all_events',
            'action_desc' => 'List All  Events',
            'category_id' => 1
        ));

        $this->db->insert('acl_actions', array(
            'action_name' => 'list_my_events',
            'action_desc' => 'List My Events',
            'category_id' => 1
        ));

        $this->db->insert('acl_actions', array(
            'action_name' => 'edit_my_events',
            'action_desc' => 'Edit my events',
            'category_id' => 1
        ));

        $this->db->insert('acl_actions', array(
            'action_name' => 'edit_all_events',
            'action_desc' => 'Edit all events',
            'category_id' => 1
        ));

        $this->db->insert('acl_actions', array(
            'action_name' => 'create_user',
            'action_desc' => 'Create user',
            'category_id' => 2
        ));

        $this->db->insert('acl_actions', array(
            'action_name' => 'edit_user',
            'action_desc' => 'Edit User',
            'category_id' => 2
        ));

        $this->db->insert('acl_actions', array(
            'action_name' => 'list_user',
            'action_desc' => 'List All Users',
            'category_id' => 2
        ));

        $this->db->insert('acl_actions', array(
            'action_name' => 'list_statistics',
            'action_desc' => 'List All Statistics',
            'category_id' => 3
        ));
    }
}