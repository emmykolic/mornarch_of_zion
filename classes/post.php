<?php
class post
{
    public $is_more = 0;
    public $er = 0;
    public $er_msg = "";

    public function __construct($db)
    {
        $this->db = $db;
        $all = $this->db->query("SELECT * FROM posts");
        $this->all = $all->num_rows;
    }

    public function get_post($start = 0, $qty = 24)
    {
        $qry = $this->db->query("SELECT * FROM posts ORDER BY pid DESC LIMIT $start , $qty");
        if (($start + $qty) < $this->all) {
            $this->is_more = 1;
        }
        return $qry;
    }
}
