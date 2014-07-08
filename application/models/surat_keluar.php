<?php
class Surat_Keluar extends CI_Model {

    var $table = 'surat_keluar';

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
            $this->db->or_like('isi_ringkas', $key);
            $this->db->or_like('kepada', $key);
            $this->db->or_like('pengolah', $key);
            $this->db->or_like('tanggal_surat', $key);
            $this->db->or_like('lampiran', $key);
            $this->db->or_like('catatan', $key);
            $this->db->or_like('dinas_instansi', $key);
        }
        $query = $this->db->get($this->table);
        return ($query->num_rows() > 0)  ? $query->result() : FALSE;
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

/* End of file surat_keluar.php */
/* Location: ./application/models/surat_keluar.php */