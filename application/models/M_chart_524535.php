<?php

class M_chart_524535 extends CI_Model
{
    function fetch_year($year)
    {
        $this->db->select('*');
        $this->db->from('reservation_524535');
        $this->db->like('birth_date', $year, 'after');
        $this->db->order_by('birth_date', 'DESC');
        return $this->db->get();
    }

    function fetch_chart_data($reservation)
    {
        $this->db->where('reservation_date', $reservation);
        $this->db->order_by('reservation_date', 'ASC');
        return $this->db->get('reservation_524535');
    }
    function getVal($year, $destination)
    {
        $this->db->select('count(*) as val');
        $this->db->from('reservation_524535');
        $this->db->where('destination', $destination);
        $this->db->like('birth_date', $year, 'after');
        return $this->db->get();
    }
}
