<?php
class Surat_Masuk extends CI_Model {

    var $table = 'surat_masuk';

    function add($data){
        $this->db->insert($this->table, $data); 
    }

    function delete($id){
        $this->db->delete($this->table, array('id' => $id));
    }

    function select($key = null) {
        if( ! empty($key)) {
            $this->db->like('indeks', $key);
            $this->db->or_like('kode', $key);
            $this->db->or_like('nomor_urut', $key);
            $this->db->or_like('tanggal_penyelesaian', $key);
            $this->db->or_like('isi_ringkas', $key);
            $this->db->or_like('asal', $key);
            $this->db->or_like('tanggal_surat', $key);
            $this->db->or_like('nomor_surat', $key);
            $this->db->or_like('lampiran', $key);
            $this->db->or_like('instruksi', $key);
            $this->db->or_like('perihal', $key);
        }
        $this->db->from($this->table);
        $query = $this->db->get();
        return ($query->num_rows() > 0)  ? $query->result() : FALSE;
    }

    function select_biggest_id() {
        $this->db->limit(1);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get($this->table);
        return $query->row();
    }

    function select_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    function update($id, $data){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data); 
    }

}

/* End of file surat_masuk.php */
/* Location: ./application/models/surat_masuk.php */