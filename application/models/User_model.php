<?php

class User_Model extends CI_Model
{
    public function getUserdata($id)
    {
        $query = "SELECT * FROM `user` INNER JOIN `role`
                  ON `user`.`role_id` = `role`.`role_id` INNER JOIN `type`
                  ON  `user`.`type_id` = `type`.`type_id`
                  WHERE `user`.`id` = $id";
        return $this->db->query($query)->result_array();
    }
}