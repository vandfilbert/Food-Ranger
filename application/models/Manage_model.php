<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Manage_model extends CI_Model
{
    //===========================================================================================================================
    public function getUserbyid($id)
    {
        $query = "SELECT * FROM `user` INNER JOIN `role`
                  ON `user`.`role_id` = `role`.`role_id` INNER JOIN `type`
                  ON  `user`.`type_id` = `type`.`type_id`
                  WHERE `user`.`id` = $id";
        return $this->db->query($query)->row_array();
    }
    //===========================================================================================================================
    public function getUser()
    {
        $query = "SELECT * FROM `user` INNER JOIN `role`
                  ON `user`.`role_id` = `role`.`role_id` INNER JOIN `type`
                  ON  `user`.`type_id` = `type`.`type_id`";
        return $this->db->query($query)->result_array();
    }
    //===========================================================================================================================
    public function deleteUser($id)
    {
        $this->db->where('event_id', $id);
        $this->db->delete('event');
    }
    //===========================================================================================================================
    public function getEvent($id)
    {
        $query = "SELECT * FROM `event` WHERE  `event_id` = $id";
        return $this->db->query($query)->result_array();
    }
    //===========================================================================================================================
    public function getAllEvent($id_user, $event_id)
    {
        $query = "SELECT * FROM `event` INNER JOIN `user`
                  ON `event`.`user_id` = `user`.`id`
                  WHERE `user`.`id` = $id_user AND `event`.`event_id` = $event_id";
        return $this->db->query($query)->result_array();
    }
    //===========================================================================================================================
}