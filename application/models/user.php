<?php
class User extends CI_Model {

    var $details;

    function validate_user($nip, $password) {
        $this->db->from('user');
        $this->db->where('nip', $nip );
        $this->db->where( 'password', sha1($password) );
        $login = $this->db->get()->result(); 

        if (is_array($login) && count($login) == 1) {
            $this->details = $login[0];
            $this->set_session();
            return TRUE;
        }

        return FALSE;
    }

    function set_session() {
        $this->session->set_userdata(
            array(
                'nip' => $this->details->nip,
                'nama' => $this->details->nama,
                'level' => $this->details->level,
                'is_logged_in' => TRUE
            )
        );
    }
}

/* End of file user.php */
/* Location: ./application/models/user.php */