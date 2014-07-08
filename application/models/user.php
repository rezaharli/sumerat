<?php
class User extends CI_Model {

    var $table = 'user';
    var $details;

    function set_session() {
        $this->session->set_userdata(array(
            'nip'           => $this->details->nip,
            'nama'          => $this->details->nama,
            'level'         => $this->details->level,
            'is_logged_in'  => TRUE
            ));
    }

    function update_password($new_password){
        $this->db->where('nip', $this->session->userdata('nip'));
        $this->db->update($this->table, array('password' => sha1($new_password)));
    }

    function validate_user($nip, $password) {
        $this->db->from($this->table);
        $this->db->where('nip', $nip );
        $this->db->where('password', sha1($password));
        $result = $this->db->get()->result(); 

        if (is_array($result) && count($result) == 1) {
            $this->details = $result[0];
            $this->set_session();
            return TRUE;
        }

        return FALSE;
    }

}

/* End of file user.php */
/* Location: ./application/models/user.php */